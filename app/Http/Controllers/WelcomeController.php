<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Welcome;
use Purifier;
use Session;

class WelcomeController extends Controller
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

    //-- method ini hanya untuk return view create saja
    public function createV() {
      return view('admin.manageWelcome.create');
    }

    public function index()
    {
        $welcomes =  Welcome::orderBy('id', 'asc')->get();

        $nama = [];
        $i = 0;
        foreach ($welcomes as $each) {
          $nama[$i]['image'] = basename($each->image);
          $nama[$i]['title'] = basename($each->title);
          $nama[$i]['body']  = $each->body;
          $nama[$i]['updated_at']  = basename($each->updated_at);
          $nama[$i]['id']    = basename($each->id);

          $i++;
        }

        return view('admin.manageWelcome.index')->withWelcomes($welcomes)->withNama($nama);
    }

    public function show($welcome_id)
    {
        $welcome =  Welcome::find($welcome_id);

        $nama = [];
        $nama['image'] = basename($welcome->image);
        $nama['title'] = basename($welcome->title);
        $nama['body']  = $welcome->body;
        $nama['updated_at']  = basename($welcome->updated_at);
        $nama['created_at']  = basename($welcome->created_at);
        $nama['id']    = basename($welcome->id);

        return view('admin.manageWelcome.show')->withWelcome($welcome)->withNama($nama);
    }
    /**
     * Show the form for creating a new resource.
     *
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
          $request->image->move(public_path('images/welcome'), $file);
          $path   =   public_path('images/welcome/'). $file;

          $welcome                    =   new Welcome;
          $welcome->title             =   $request->input('title');
          $welcome->body              =   Purifier::clean($request->input('body'));
          $welcome->image             =   $path;
          $result                     =   $welcome->save();

          return redirect()->route('indeks');

          return response()->json(['status' => 'success', 'message' => $request->all()]);
      }
    }


     public function edit($id){
       $welcome = Welcome::find($id);

       return view('admin.manageWelcome.update')->withWelcome($welcome);
     }

    public function update(Request $request, $welcome_id)
    {

      if (!empty($welcome_id)) {
          $validator  =   Validator::make($request->all(), [
              'title'        =>  'required|max:255',
              //'image'        =>  'required',
              'body'         =>  'required'
          ]);
          if($validator->fails()) {
              $error  =   $validator->messages()->toJson();

              return response()->json(['status' => 'salah', 'message' => $error]);
          } else {
              $welcome                   =   Welcome::find($welcome_id);
              $welcome->title       =   $request->input('title');
              $welcome->body     =   $request->input('body');
              $ex_name                =   $welcome->image;
              $new_name               =   substr($ex_name, -14);
              if($request->hasFile('image')) {
                  if (File::exists(base_path()) ."/public/images/welcome/". $new_name) {
                    File::delete(base_path() ."/public/images/welcome/". $new_name);
                  }
                  $file   =   time().'.'.$request->image->getClientOriginalExtension();
                  $request->image->move(public_path('images/welcome'), $file);
                  $path   =   public_path('images/welcome/'). $file;
                  $welcome->image = $path;
              }

              $result               =   $welcome->save();

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
        $welcome           =   Welcome::findOrFail($id);
        $filename       =   $welcome->image;
        $rest           = substr($filename, -14);
        File::delete(base_path() ."/public/images/welcome/". $rest);
        $response       =   $welcome->delete();

        return redirect()->route('indeks');

        return response()->json(['status' => 'success', 'message' => 'Data was deleted']);

    }
}
