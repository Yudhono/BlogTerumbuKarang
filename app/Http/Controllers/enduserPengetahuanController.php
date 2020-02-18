<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pengetahuan;

class enduserPengetahuanController extends Controller
{
    public function index() {
      $pengetahuans = Pengetahuan::orderBy('created_at', 'desc')->get();

      $nama = [];
      $i = 0;
      foreach ($pengetahuans as $each) {
        $nama[$i]['image']  = basename($each->image);
        $nama[$i]['title']  = basename($each->title);
        $nama[$i]['body']   = $each->body;
        $nama[$i]['id']     = basename($each->id);

        $i++;
      }

      //return json_encode($nama);
      return view('layouts.master')->withNama($nama);
    }
}
