<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Comment;
use App\Project;
use Response;

class commentsController extends Controller
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

    public function store(Request $request, $project_id) {
      $validator = Validator::make($request->all(), [
        'name'      =>  'required|max:255',
        'email'     =>  'required|email|max:255',
        'comment'   =>  'required|min:1|max:2000'

      ]);

      if($validator->fails()) {
          $error = $validator->messages()->toJson();

          return response()->json(['status' => 'salah', 'message' => $error]);
      } else {
          $project = Project::find($project_id);

          $commen            =   new Comment;
          $commen->name      =   $request->input('name');
          $commen->email     =   $request->input('email');
          $commen->comment   =   $request->input('comment');
          $commen->approved  = true;

          $commen->project()->associate($project);

          $result             =   $commen->save();

          // $response = array(
          //     'status' => 'success',
          //     'msg' => 'Setting created successfully',
          // );
          // return Response::json($response);
        return redirect()->route('projects_single', ['$project' => $project_id]);
    }
  }

    public function edit($id) {
      $comment = Comment::find($id);

      return view('admin.comments.edit')->withComment($comment);
    }

    public function update(Request $request, $comment_id){
        if (!empty($comment_id)) {
          $validator  =   Validator::make($request->all(), [
            'comment'   =>  'required|min:1|max:2000'

          ]);
          if($validator->fails()) {
              $error  =   $validator->messages()->toJson();
              dd($error);
              return response()->json(['status' => 'salah', 'message' => $error]);
          } else {
              $comment              =   Comment::find($comment_id);
              $comment->comment     =   $request->input('comment');

              $result               =   $comment->save();

              //return response()->json(['status' => 'success', 'message' => 'data was updated']);
              return redirect()->route('prlihat', $comment->project->id);
          }
      } else {

          return response()->json(['status' => 'false', 'message' => 'No parameter Id selected']);
      }
    }

    public function delete($id){
        $comment = Comment::find($id);
        return view('admin.comments.delete')->withComment($comment);
    }

    public function destroy($id){
        $comment = Comment::find($id);
        $project_id = $comment->project->id;
        $comment->delete();

        //return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
        return redirect()->route('prlihat', ['$comment' => $project_id]);
    }
}
