<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\File;
use Purifier;
use App\Pengetahuan;
use Validator;

class PengeController extends BaseController {

      /**method contructor untuk construct method middleware menentukan method mana saja dalam
      controller ini yaang digunakan untuk masing masing role berdasarkan permissionnya**/
      function __construct()
      {
           //-- permission mengizinkan semua method untuk dapat digunakan
           $this->middleware('permission:role-list');
           //-- permission mengizinkan hanya method createV() dan store() yang boleh digunakan oleh role
           $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
           //-- permission mengizinkan hanya method edit() dan update() yang boleh digunakan oleh role
           $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
           //-- permission mengizinkan hanya method destroy
           $this->middleware('permission:role-delete', ['only' => ['destroy']]);
      }

      public function index() {
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

        return $this->sendResponse($pengetahuans->toArray(), 'Pengetahuan retrieved successfully.');
      }

      public function show($pengetahuan_id) {
          $pengetahuan =  Pengetahuan::find($pengetahuan_id);

          $nama = [];
          $nama['image']       = basename($pengetahuan->image);
          $nama['title']       = basename($pengetahuan->title);
          $nama['body']        = $pengetahuan->body;
          $nama['updated_at']  = basename($pengetahuan->updated_at);
          $nama['created_at']  = basename($pengetahuan->created_at);
          $nama['id']          = basename($pengetahuan->id);

          //return json_encode($pengetahuan);
          if (is_null($nama)) {
              return $this->sendError('Pengetahuan not found.');
          }


          return $this->sendResponse($nama, 'Pengetahuan retrieved successfully.');
      }

      public function create(Request $request) {

         $validator = Validator::make($request->all(), [
             'title'        => 'required|max:255',
             'image'        => 'required',
             'body'         => 'required',
         ]);

         $gambar = $request->input('image');
         $upload_dir = 'C:\xampp\htdocs\blog\public\images/pengetahuan/'.$gambar;
         $ext = pathinfo($gambar, PATHINFO_EXTENSION);

         if($validator->fails()) {
             $error = $validator->messages()->toJson();

             return response()->json(['status' => 'salah', 'message' => $error]);
         } else {
             //$file   =   time().'.'.$request->image->getClientOriginalExtension();
             //$gambar->move(public_path('images/pengetahuan'), $ext);
             //$path   =   public_path('images/pengetahuan/'). $ext;

             move_uploaded_file($gambar, $upload_dir);

             $pengetahuan                =   new Pengetahuan;
             $pengetahuan->title         =   $request->input('title');
             $pengetahuan->body          =   Purifier::clean($request->input('body'));
             $pengetahuan->image         =   $gambar;
             //$pengetahuan->image         =   $request->input('image');
             $result                     =   $pengetahuan->save();

             //return redirect()->route('pengetahuan');

             return $this->sendResponse($pengetahuan->toArray(), 'Pengetahuan created successfully.');
         }
       }

     public function update(Request $request, $pengetahuan_id) {

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

                 //return back();
                 return $this->sendResponse($pengetahuan->toArray(), 'Pengetahuan updated successfully.');
             }
         } else {

             return response()->json(['status' => 'false', 'message' => 'No parameter Id selected']);
         }
       }

       public function destroy($id) {

         $pengetahuan    =   Pengetahuan::findOrFail($id);
         // $filename       =   $pengetahuan->image;
         // $rest           = substr($filename, -14);
         // File::delete(base_path() ."/public/images/pengetahuan/". $rest);
        $pengetahuan->delete();

         //return redirect()->route('pengetahuan');

         return $this->sendResponse($pengetahuan->toArray(), 'Pengetahuan deleted successfully.');
        }

}
