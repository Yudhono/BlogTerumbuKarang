<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Welcome;
use App\Pengetahuan;
use App\Banner;
use App\Project;
use App\OurProject;

class welcomeEnduser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**method contructor untuk construct method middleware menentukan method mana saja dalam
     controller ini yaang digunakan untuk masing masing role berdasarkan permissionnya**/
     function __construct()
     {
          //-- permission mengizinkan semua method untuk dapat digunakan
          $this->middleware('permission:role-list');
          //-- permission mengizinkan hanya method createV() dan store() yang boleh digunakan oleh role
          $this->middleware('permission:role-create', ['only' => ['createV', 'store']]);
          //-- permission mengizinkan hanya method edit() dan update() yang boleh digunakan oleh role
          $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
          //-- permission mengizinkan hanya method destroy
          $this->middleware('permission:role-delete', ['only' => ['destroy']]);
     }

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

      $our = OurProject::orderBy('created_at', 'desc')->limit(1)->first();

      $nama6 = [];

      $nama6['image']              = basename($our->image);
      $nama6['title']              = basename($our->title);
      $nama6['projectDescription'] = $our->projectDescription;
      $nama6['id']                 = basename($our->id);

      $pengetahuans = Pengetahuan::orderBy('created_at', 'dsc')->limit(3)->get();
      $pengetahuanx = Pengetahuan::orderBy('created_at', 'asc')->limit(3)->get();

      $nama2 = [];
      $i = 0;
      foreach ($pengetahuans as $each) {
        $nama2[$i]['image']  = basename($each->image);
        $nama2[$i]['title']  = basename($each->title);
        $nama2[$i]['body']   = $each->body;
        $nama2[$i]['id']     = basename($each->id);

        $i++;
      }

      $nama3 = [];
      $i = 0;
      foreach ($pengetahuanx as $each) {
        $nama3[$i]['image']  = basename($each->image);
        $nama3[$i]['title']  = basename($each->title);
        $nama3[$i]['body']   = $each->body;
        $nama3[$i]['id']     = basename($each->id);

        $i++;
      }

      $welcome = Welcome::orderBy('created_at', 'desc')->limit(1)->first();

      $nama = [];

      $nama['image']  = basename($welcome->image);
      $nama['body']   = $welcome->body;
      $nama['title']  = basename($welcome->title);
      $nama['id']     = basename($welcome->id);

      //return response()->json($nama5);
      return view('layouts.master')
                                ->withNama($nama)
                                ->withNama2($nama2)
                                ->withNama3($nama3)
                                ->withNama4($nama4)
                                ->withNama5($nama5)
                                ->withNama6($nama6)
                                ->withProjects($projects);
    }

    public function getProjectSingle($id_project) {

      $project2 = Project::where('id', '=', $id_project)->first();

      $project = DB::table('projects')
                      ->join('daerahs', 'projects.daerah_id', '=', 'daerahs.id')
                      ->where('projects.id', '=', $id_project)
                      ->select('daerahs.id as idnya_daerah',
                                'projects.image as image',
                                'projects.title as title',
                                'projects.karang_hidup as karang_hidup',
                                'projects.karang_mati as karang_mati',
                                'projects.pasir as pasir',
                                'projects.total as total',
                                'projects.tahun as tahun',
                                'projects.tutupan as tutupan',
                                'projects.keputusan as keputusan',
                                'daerahs.nama_daerah as nama_daerah',
                                'projects.body as body',
                                'projects.created_at as created_at',
                                'projects.updated_at as updated_at',
                                'projects.created_by as created_by',
                                'projects.id as id')->first();

      $nama['image']        = basename($project->image);
      $nama['title']        = basename($project->title);
      $nama['karang_hidup'] = basename($project->karang_hidup);
      $nama['karang_mati']  = basename($project->karang_mati);
      $nama['pasir']        = basename($project->pasir);
      $nama['total']        = basename($project->total);
      $nama['tahun']        = basename($project->tahun);
      $nama['tutupan']      = basename($project->tutupan);
      $nama['keputusan']    = basename($project->keputusan);
      $nama['nama_daerah']  = basename($project->nama_daerah);
      $nama['body']         = $project->body;
      $nama['updated_at']   = basename($project->updated_at);
      $nama['created_at']   = basename($project->created_at);
      $nama['created_by']   = basename($project->created_by);
      $nama['id']           = basename($project->id);

      //return response()->json($project);

      return view('projects_single')->withNama($nama)->withProject2($project2);
    }
}
