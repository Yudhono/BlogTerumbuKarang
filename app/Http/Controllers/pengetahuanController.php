<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Pengetahuan;
use Purifier;
use Session;

class pengetahuanController extends Controller
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
      return view('admin.pusatPengetahuan.create');
    }

    public function index()
    {
      $pengetahuans =  Pengetahuan::orderBy('id', 'asc')->get();

      $nama = [];
      $i = 0;
      foreach ($pengetahuans as $each) {
        $nama[$i]['image'] = basename($each->image);
        $nama[$i]['title'] = basename($each->title);
        $nama[$i]['body']  = $each->body;
        $nama[$i]['updated_at']  = basename($each->updated_at);
        $nama[$i]['id']    = basename($each->id);

        $i++;
      }

      //return json_encode($pengetahuans);
      return view('admin.pusatPengetahuan.index')->withPengetahuans($pengetahuans)->withNama($nama);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function show($pengetahuan_id)
     {
         $pengetahuan =  Pengetahuan::find($pengetahuan_id);

         $nama = [];
         $nama['image']       = basename($pengetahuan->image);
         $nama['title']       = basename($pengetahuan->title);
         $nama['body']        = $pengetahuan->body;
         $nama['updated_at']  = basename($pengetahuan->updated_at);
         $nama['created_at']  = basename($pengetahuan->created_at);
         $nama['id']          = basename($pengetahuan->id);

         //return json_encode($pengetahuan);
         return view('admin.pusatPengetahuan.show')->withPengetahuan($pengetahuan)->withNama($nama);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
    {

      $validator = Validator::make($request->all(), [
          'title'        => 'required|max:255',
          'image'        => 'required|mimes:jpeg,png,jpg|max:2048',
          'body'         => 'required',
      ]);

      if($validator->fails()) {
          $error = $validator->messages()->toJson();

          return response()->json(['status' => 'salah', 'message' => $error]);
      } else {
          $file   =   time().'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('images/pengetahuan'), $file);
          $path   =   public_path('images/pengetahuan/'). $file;

          $pengetahuan                =   new Pengetahuan;
          $pengetahuan->title         =   $request->input('title');
          $pengetahuan->body          =   Purifier::clean($request->input('body'));
          $pengetahuan->image         =   $path;
          $result                     =   $pengetahuan->save();

          return redirect()->route('pengetahuan');

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
      $pengetahuan = Pengetahuan::find($id);

     return view('admin.pusatPengetahuan.update')->withPengetahuan($pengetahuan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pengetahuan_id)
    {
        if (!empty($pengetahuan_id)) {
          $validator  =   Validator::make($request->all(), [
              'title'        =>  'required|max:255',
              //'image'        =>  'required',
              'body'         =>  'required'
          ]);
          if($validator->fails()) {
              $error  =   $validator->messages()->toJson();

              return response()->json(['status' => 'salah', 'message' => $error]);
          } else {
              $pengetahuan            =   Pengetahuan::find($pengetahuan_id);
              $pengetahuan->title     =   $request->input('title');
              $pengetahuan->body      =   $request->input('body');
              $ex_name                =   $pengetahuan->image;
              $new_name               =   substr($ex_name, -14);
              if($request->hasFile('image')) {
                  if (File::exists(base_path()) ."/public/images/pengetahuan/". $new_name) {
                    File::delete(base_path() ."/public/images/pengetahuan/". $new_name);
                  }
                  $file   =   time().'.'.$request->image->getClientOriginalExtension();
                  $request->image->move(public_path('images/pengetahuan'), $file);
                  $path   =   public_path('images/pengetahuan/'). $file;
                  $pengetahuan->image = $path;
              }

              $result               =   $pengetahuan->save();

              return back();
              return response()->json(['status' => 'success', 'message' => 'data was updated']);
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
      $pengetahuan    =   Pengetahuan::findOrFail($id);
      $filename       =   $pengetahuan->image;
      $rest           = substr($filename, -14);
      File::delete(base_path() ."/public/images/pengetahuan/". $rest);
      $response       =   $pengetahuan->delete();

      return redirect()->route('pengetahuan');

      return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
    }
}
