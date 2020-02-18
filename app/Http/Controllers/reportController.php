<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;


class reportController extends Controller
{
    // -- fungsi untuk menghitung total daerah dalam kurun waktu berdasarkan nama daerah
    public function chart( $startDate, $endDate ) {
      $result = \DB::table('projects')
                  ->join('daerahs', 'projects.daerah_id', '=', 'daerahs.id')
                  ->select('projects.id', DB::raw('count(daerahs.nama_daerah) as total'), 'projects.title', 'daerahs.nama_daerah', 'projects.created_at')
                  ->groupBy('daerahs.nama_daerah')
                  ->whereBetween('projects.created_at', [ $startDate . ' 00:00:00', $endDate . ' 23:59:59'])
                  ->get();

    return response()->json($result);

    }

    public function tampil() {
      return view('admin.report.report1');
    }
}
