<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\OurProject;
use Purifier;

class our_projectController extends Controller
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
    return view('admin.manageOurProject.create');
  }

  public function index() {
    $ours =  OurProject::orderBy('id', 'desc')->get();

    $nama = [];
    $i = 0;
    foreach ($ours as $each) {
      $nama[$i]['image']              = basename($each->image);
      $nama[$i]['title']              = basename($each->title);
      $nama[$i]['projectDescription'] = $each->projectDescription;
      $nama[$i]['updated_at']         = basename($each->updated_at);
      $nama[$i]['id']                 = basename($each->id);

      $i++;
    }

    //return json_encode($ours);
    return view('admin.manageOurProject.index')->withOurs($ours)->withNama($nama);
  }

  public function show($ourProject_id) {
    $our =  OurProject::find($ourProject_id);

       $nama = [];
       $nama['image']               = basename($our->image);
       $nama['title']               = basename($our->title);
       $nama['projectDescription']  = $our->projectDescription;
       $nama['updated_at']          = basename($our->updated_at);
       $nama['created_at']          = basename($our->created_at);
       $nama['id']                  = basename($our->id);

       //return json_encode($our);
       return view('admin.manageOurProject.show')->withOur($our)->withNama($nama);
  }

  public function create(Request $request) {
    $validator = Validator::make($request->all(), [
        'title'                => 'required|max:255',
        'projectDescription'   => 'required',
        'image'                => 'required|mimes:jpeg,png,jpg|max:2048',

    ]);

    if($validator->fails()) {
        $error = $validator->messages()->toJson();

        return response()->json(['status' => 'salah', 'message' => $error]);
    } else {
        $file   =   time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/OurProject'), $file);
        $path   =   public_path('images/OurProject/'). $file;

        $our                     =   new OurProject;
        $our->title              =   $request->input('title');
        $our->projectDescription =   Purifier::clean($request->input('projectDescription'));
        $our->image              =   $path;
        $result                  =   $our->save();

        //return redirect()->route('ourPro');

        return response()->json(['status' => 'success', 'message' => $request->all()]);
  }
}

  public function edit($id)
  {
    $our = OurProject::find($id);

   return view('admin.manageOurProject.update')->withOur($our);
  }

  public function update(Request $request, $ourProject_id)
  {
      if (!empty($ourProject_id)) {
        $validator  =   Validator::make($request->all(), [
            'title'                =>  'required|max:255',
            'projectDescription'   =>  'required',

        ]);
        if($validator->fails()) {
            $error  =   $validator->messages()->toJson();

            return response()->json(['status' => 'salah', 'message' => $error]);
        } else {
            $our                     =   OurProject::find($ourProject_id);
            $our->title              =   $request->input('title');
            $our->projectDescription =   Purifier::clean($request->input('projectDescription'));

            $ex_name            =   $our->image;
            $new_name           =   substr($ex_name, -14);
            if($request->hasFile('image')) {
                if (File::exists(base_path()) ."/public/images/OurProject/". $new_name) {
                  File::delete(base_path() ."/public/images/OurProject/". $new_name);
                }
                $file   =   time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/OurProject'), $file);
                $path   =   public_path('images/OurProject/'). $file;
                $our->image = $path;
            }

            $result               =   $our->save();

            return back();
            return response()->json(['status' => 'success', 'message' => 'data was updated']);
        }
    } else {

        return response()->json(['status' => 'false', 'message' => 'No parameter Id selected']);
    }
  }

  public function destroy($id)
  {
    $our            =   OurProject::findOrFail($id);
    $filename       =   $our->image;
    $rest           = substr($filename, -14);
    File::delete(base_path() ."/public/images/OurProject/". $rest);
    $response       =   $our->delete();

    return redirect()->route('ourPro');

    return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
  }

}
