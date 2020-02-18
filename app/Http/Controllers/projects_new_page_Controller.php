<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Project;
use App\Daerah;

class projects_new_page_Controller extends Controller
{
    public function getIndex() {
      $projects = Project::orderBy('created_at', 'desc')->paginate(3);

      $nama = [];
      $i = 0;
      foreach ($projects as $each) {
        $nama[$i]['image']         = basename($each->image);
        $nama[$i]['title']         = basename($each->title);
        $nama[$i]['tahun']         = basename($each->tahun);
        $nama[$i]['karang_hidup']  = basename($each->karang_hidup);
        $nama[$i]['karang_mati']   = basename($each->karang_mati);
        $nama[$i]['body']          = $each->body;
        $nama[$i]['created_by']    = basename($each->created_by);
        $nama[$i]['created_at']    = basename($each->created_at);
        $nama[$i]['id']            = basename($each->id);

        $i++;
      }

      $daerahs = Daerah::all();

      return view('projects_new_page')
                          ->withNama($nama)
                          ->withDaerahs($daerahs)
                          ->withProjects($projects);
    }

    public function getSingle($id_project) {
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

      $nama2['image']        = basename($project->image);
      $nama2['title']        = basename($project->title);
      $nama2['karang_hidup'] = basename($project->karang_hidup);
      $nama2['karang_mati']  = basename($project->karang_mati);
      $nama2['pasir']        = basename($project->pasir);
      $nama2['total']        = basename($project->total);
      $nama2['tahun']        = basename($project->tahun);
      $nama2['tutupan']      = basename($project->tutupan);
      $nama2['keputusan']    = basename($project->keputusan);
      $nama2['nama_daerah']  = basename($project->nama_daerah);
      $nama2['body']         = $project->body;
      $nama2['updated_at']   = basename($project->updated_at);
      $nama2['created_at']   = basename($project->created_at);
      $nama2['created_by']   = basename($project->created_by);
      $nama2['id']           = basename($project->id);

      //return response()->json($project2);

      return view('projects_single')->withNama($nama2);
    }

    public function tampilBerdasarkan_daerah($id_daerah) {
      $daerahs = DB::table('projects')
                      ->join('daerahs', 'projects.daerah_id', '=', 'daerahs.id')
                      ->where('daerahs.id', '=', $id_daerah)
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
                                'projects.id as id')->paginate(3);

                                $nama = [];
                                $i = 0;
                                foreach ($daerahs as $each) {
                                  $nama[$i]['image']         = basename($each->image);
                                  $nama[$i]['title']         = basename($each->title);
                                  $nama[$i]['tahun']         = basename($each->tahun);
                                  $nama[$i]['karang_hidup']  = basename($each->karang_hidup);
                                  $nama[$i]['karang_mati']   = basename($each->karang_mati);
                                  $nama[$i]['body']          = $each->body;
                                  $nama[$i]['created_by']    = basename($each->created_by);
                                  $nama[$i]['nama_daerah']   = basename($each->nama_daerah);
                                  $nama[$i]['created_at']    = basename($each->created_at);
                                  $nama[$i]['id']            = basename($each->id);

                                  $i++;
                                }

      $daer = Daerah::all();

      return view('projects_tampilberdasarkan_daerah')->withNama($nama)->withDaer($daer)->withDaerahs($daerahs);
    }
}
