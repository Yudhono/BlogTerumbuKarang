<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Project;
use App\Banner;
use App\Daerah;

class projects_newPage2_Controller extends Controller
{

  public function getIndex() {
    $projects = Project::orderBy('created_at', 'desc')->paginate(8);
    //$project = Project::orderBy('created_at', 'desc')->paginate(8);

    $nama5 = [];
    $i = 0;
    foreach ($projects as $each) {
      $nama5[$i]['image']         = basename($each->image);
      $nama5[$i]['title']         = basename($each->title);
      $nama5[$i]['tahun']         = basename($each->tahun);
      $nama5[$i]['karang_hidup']  = basename($each->karang_hidup);
      $nama5[$i]['karang_mati']   = basename($each->karang_mati);
      $nama5[$i]['body']          = $each->body;
      $nama5[$i]['created_by']    = basename($each->created_by);
      $nama5[$i]['id']            = basename($each->id);

      $i++;
    }

    $banner = Banner::orderBy('created_at', 'desc')->limit(1)->first();

    $nama4 = [];

    $nama4['image']       = basename($banner->image);
    $nama4['title']       = basename($banner->title);
    $nama4['subtitle_1']  = basename($banner->subtitle_1);
    $nama4['subtitle_2']  = basename($banner->subtitle_2);
    $nama4['id']          = basename($banner->id);

    return view('projects_newPage2')
                                  ->withNama4($nama4)
                                  ->withNama5($nama5)
                                  ->withProjects($projects);
  }


  public function search() {
    $search = \Request::get('search'); //-- by pass nilai dari variabel di view disimpan ke variabel $search
    //-- query buat searching
    $projects = DB::table('projects')
                    ->join('daerahs', 'projects.daerah_id', '=', 'daerahs.id')
                    ->where(function($query){
                      $search = \Request::get('search');
                      return $query->where('projects.body', 'like', '%'. $search . '%') //-- search berdasarkan kontent project
                      ->orWhere('daerahs.nama_daerah', 'like', '%'. $search . '%') //-- search berdasarkan daerah
                      ->orWhere('projects.tahun', 'like', '%'. $search . '%'); //-- search berdasarkan tahun
                    })->get()->toArray();

    //-- looping untuk masing2 karakter yang akan di mark
     foreach($projects as &$project){
       $project->body =str_ireplace($search,"<mark class='highlight'>$search</mark>",$project->body); //-- mark setiap string

       $project->image = basename($project->image);
    }

    $daerahs = Daerah::all();
    //return json_encode($projects);
    return view('projects_new_page')
                        ->withSearch($search)
                        ->withDaerahs($daerahs)
                        ->withProjects($projects);


  }
}
