<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Daerah;
use Purifier;
use Session;

class projectController extends Controller
{

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

  public function createV() {
    return view('admin.manageProject.create');
  }

  public function index()
  {
    //$projects =  Project::orderBy('id', 'asc')->get();

    $projects = DB::table('projects')
                    ->join('daerahs', 'projects.daerah_id', '=', 'daerahs.id')
                    ->select('daerahs.id as idnya_daerah',
                              'projects.image as image',
                              'projects.title as title',
                              'projects.karang_hidup as karang_hidup',
                              'projects.karang_mati as karang_mati',
                              'projects.pasir as pasir',
                              'projects.total as total',
                              'projects.tutupan as tutupan',
                              'projects.keputusan as keputusan',
                              'projects.tahun as tahun',
                              'daerahs.nama_daerah as nama_daerah',
                              'projects.body as body',
                              'projects.updated_at as updated_at',
                              'projects.created_by as created_by',
                              'projects.id as id')
                    ->orderBy('projects.created_at', '=', 'dsc')->get();

    $nama = [];
    $i = 0;
    foreach ($projects as $each) {
      $nama[$i]['image']        = basename($each->image);
      $nama[$i]['title']        = basename($each->title);
      $nama[$i]['karang_hidup'] = basename($each->karang_hidup);
      $nama[$i]['karang_mati']  = basename($each->karang_mati);
      $nama[$i]['pasir']        = basename($each->pasir);
      $nama[$i]['total']        = basename($each->total);
      $nama[$i]['tutupan']      = basename($each->tutupan);
      $nama[$i]['keputusan']    = basename($each->keputusan);
      $nama[$i]['tahun']        = basename($each->tahun);
      $nama[$i]['nama_daerah']  = basename($each->nama_daerah);
      $nama[$i]['body']         = $each->body;
      $nama[$i]['updated_at']   = basename($each->updated_at);
      $nama[$i]['created_by']   = basename($each->created_by);
      $nama[$i]['id']           = basename($each->id);
      $nama[$i]['idnya_daerah'] = basename($each->idnya_daerah);

      $i++;
    }


    //return response()->json($projects);
    return view('admin.manageProject.index')->withProjects($projects)->withNama($nama);
  }



  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function show($project_id)
   {
       $project =  Project::find($project_id);

       $nama['image']        = basename($project->image);
       $nama['title']        = basename($project->title);
       $nama['karang_hidup'] = basename($project->karang_hidup);
       $nama['karang_mati']  = basename($project->karang_mati);
       $nama['pasir']        = basename($project->pasir);
       $nama['total']        = basename($project->total);
       $nama['tutupan']      = basename($project->tutupan);
       $nama['keputusan']    = basename($project->keputusan);
       $nama['tahun']        = basename($project->tahun);
       $nama['daerah_id']    = basename($project->daerah_id);
       $nama['body']         = $project->body;
       $nama['updated_at']   = basename($project->updated_at);
       $nama['created_at']   = basename($project->created_at);
       $nama['created_by']   = basename($project->created_by);
       $nama['id']           = basename($project->id);

       //return response()->json($project);
       return view('admin.manageProject.show')->withProject($project)->withNama($nama);
   }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   // fungsi buat menghitung total
   public function total($karang_hidup, $karang_mati, $pasir) {
     $total = ($karang_hidup + $karang_mati + $pasir);

     return $total;
   }

   public function getDaerahID() {
       $ids = Daerah::all();

       //return response()->json($ids);
       return view('admin.manageProject.create')->withIds($ids);
      // return view('admin.manageProject.upda')->with(['name' => $ids]);
     }

  //fungsi buat menghitung tutupan
   public function tutupan($karang_hidup, $karang_mati, $pasir) {
     $tutupan = (($karang_hidup / ($karang_hidup + $karang_mati + $pasir))*100);

     //$percent = $tutupan * 100 . '%';

     return $tutupan;
   }

   public function keputusan($tutupan) {
     if ($tutupan >= 0 && $tutupan <= 24.9 ) {
       $hasil = "Tutupan terumbu karang: ". $tutupan . "<br>
       daerah ini tergolong pada keadaan rusak buruk, upaya
       pemulihan yang dapat dilakukan sebagai berikut:<br>
              Pembibitan:<br>
              >Biorock<br>
              >AR (Artifical Reefs)<br>
              >Teknik Telur atau larva<br>

              Penutupan Sementara";
     } else if ($tutupan >= 25 && $tutupan <= 49.9) {
        $hasil = "Tutupan terumbu karang: ". $tutupan . "<br>
        daerah ini tergolong pada keadaan karang rusak sedang, upaya
        pemulihan yang dapat dilakukan sebagai berikut:<br>
              > Penutupan Sementara<br>
              > Transplantasi<br>
              > Zonasi";
     } else if ($tutupan >= 50 && $tutupan <= 74.9) {
       $hasil = "Tutupan terumbu karang: ". $tutupan . "<br>
       daerah ini tergolong pada keadaan karang baik, upaya
       pemulihandan konservasi yang dapat dilakukan sebagai berikut:<br>
              Pemulihan:<br>
              >Transplantasi<br>
              >Zonasi<br>
              >Rehabilitasi Aktif<br>

              Konservasi:<br>
              >Taman Nasional Laut<br>
              >Taman Wisata Laut<br>
              >Wisata Bahari";
     } else if ($tutupan >= 88 && $tutupan <= 100) {
        $hasil = "Tutupan terumbu karang: ". $tutupan ."<br>
        daerah ini tergolong pada keadaan karang baik sekali, upaya
        konservasi yang dapat dilakukan sebagai berikut:<br>
              >Cagar Alam Laut";
     }

     return $hasil;
   }

   public function create(Request $request)
  {

    $validator = Validator::make($request->all(), [
        'title'         => 'required|max:255',
        'karang_hidup'  => 'required',
        'karang_mati'   => 'required',
        'pasir'         => 'required',
        'tahun'         => 'required',
        //'total'         => 'required',
        //'tutupan'       => 'required',
        'daerah_id'     => 'required',
        'image'         => 'required|mimes:jpeg,png,jpg|max:2048',
        'body'          => 'required',
        'created_by'    => 'required',
    ]);

    if($validator->fails()) {
        $error = $validator->messages()->toJson();

        return response()->json(['status' => 'salah', 'message' => $error]);
    } else {
        $file   =   time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/project'), $file);
        $path   =   public_path('images/project/'). $file;

        $project    =   new Project;

        $ka_hidup   =   $request->input('karang_hidup');
        $ka_mati    =   $request->input('karang_mati');
        $lemah      =   $request->input('pasir');

        $Itotal = $this->total($ka_hidup, $ka_mati, $lemah);
        $Itutupan = $this->tutupan($ka_hidup, $ka_mati, $lemah);
        $Ikeputusan = $this->keputusan($Itutupan);

        $project->title           =   $request->input('title');
        $project->karang_hidup    =   $ka_hidup;
        $project->karang_mati     =   $ka_mati;
        $project->pasir           =   $lemah;
        $project->total           =   $Itotal;
        $project->tutupan         =   $Itutupan;
        $project->keputusan       =   $Ikeputusan;
        $project->tahun           =   $request->input('tahun');
        $project->daerah_id       =   $request->input('daerah_id');
        $project->created_by      =   $request->input('created_by');
        $project->body            =   Purifier::clean($request->input('body'));
        $project->image           =   $path;
        $result                   =   $project->save();

        return redirect()->route('project');

        return response()->json(['status' => 'success', 'message' => $request->all()]);
    }
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $project = Project::find($id);

    $nama = DB::table('projects')
                    ->join('daerahs', 'projects.daerah_id', '=', 'daerahs.id')
                    ->where('projects.id', '=', $id)
                    ->select('daerahs.nama_daerah')->pluck('nama_daerah')->first();

    $daerahs = Daerah::all();

    //return response()->json($nama);
   return view('admin.manageProject.update')->withProject($project)->withNama($nama)->withDaerahs($daerahs);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $project_id)
  {
      if (!empty($project_id)) {
        $validator  =   Validator::make($request->all(), [
            'title'         =>  'required|max:255',
            'karang_hidup'  => 'required',
            'karang_mati'   => 'required',
            'pasir'         => 'required',
            //'total'         => 'required',
            //'tutupan'       => 'required',
            'daerah_id'     => 'required',
            //'image'         => 'required|mimes:jpeg,png,jpg|max:2048',
            'body'          => 'required',
            'created_by'    => 'required',
        ]);
        if($validator->fails()) {
            $error  =   $validator->messages()->toJson();

            return response()->json(['status' => 'salah', 'message' => $error]);
        } else {
            $project                =   Project::find($project_id);
            $project->title         =   $request->input('title');

            $ka_hidup   =   $request->input('karang_hidup');
            $ka_mati    =   $request->input('karang_mati');
            $lemah      =   $request->input('pasir');

            $Itotal = $this->total($ka_hidup, $ka_mati, $lemah);
            $Itutupan = $this->tutupan($ka_hidup, $ka_mati, $lemah);

            $project->karang_hidup    =   $ka_hidup;
            $project->karang_mati     =   $ka_mati;
            $project->pasir           =   $lemah;
            $project->total           =   $Itotal;
            $project->tutupan         =   $Itutupan;
            $project->tahun           =   $request->input('tahun');
            $project->daerah_id       =   $request->input('daerah_id');
            $project->created_by      =   $request->input('created_by');
            $project->body            =   Purifier::clean($request->input('body'));
            $ex_name                =   $project->image;
            $new_name               =   substr($ex_name, -14);
            if($request->hasFile('image')) {
                if (File::exists(base_path()) ."/public/images/project/". $new_name) {
                  File::delete(base_path() ."/public/images/project/". $new_name);
                }
                $file   =   time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/project'), $file);
                $path   =   public_path('images/project/'). $file;
                $project->image = $path;
            }

            $result               =   $project->save();

            return redirect()->route('project');
            //return response()->json(['status' => 'success', 'message' => 'data was updated']);
        }
    } else {

        return response()->json(['status' => 'false', 'message' => 'No parameter Id selected']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $project        =   Project::findOrFail($id);
    $filename       =   $project->image;
    $rest           =   substr($filename, -14);
    File::delete(base_path() ."/public/images/project/". $rest);
    $response       =   $project->delete();

    return redirect()->route('project');

    return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
  }
}
