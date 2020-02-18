<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Daerah;
use Purifier;
use Session;

class DaerahController extends Controller
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
      return view('admin.manageDaerah.create');
    }

    public function index()
    {
        $daerahs =  Daerah::orderBy('id', 'asc')->get();

        //return json_encode($daerahs);
        return view('admin.manageDaerah.index')->withDaerahs($daerahs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
          $validator = Validator::make($request->all(), [
            'nama_daerah'        => 'required|max:255',
            'deskripsi'          => 'required',
        ]);

        if($validator->fails()) {
            $error = $validator->messages()->toJson();

            return response()->json(['status' => 'salah', 'message' => $error]);
        } else {

            $daerah                =   new Daerah;
            $daerah->nama_daerah   =   $request->input('nama_daerah');
            $daerah->deskripsi     =   Purifier::clean($request->input('deskripsi'));
            $result                =   $daerah->save();

            return redirect()->route('daerah');

            return response()->json(['status' => 'success', 'message' => $request->all()]);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daerah = Daerah::find($id);

        //return json_encode($daerah);
        return view('admin.manageDaerah.show')->withDaerah($daerah);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $daerah = Daerah::find($id);

      return view('admin.manageDaerah.update')->withDaerah($daerah);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          if (!empty($id)) {
            $validator  =   Validator::make($request->all(), [
                'nama_daerah'       =>  'required|max:255',
                'deskripsi'         =>  'required'
            ]);
            if($validator->fails()) {
                $error  =   $validator->messages()->toJson();

                return response()->json(['status' => 'salah', 'message' => $error]);
            } else {
                $daerah                 =   Daerah::find($id);
                $daerah->nama_daerah    =   $request->input('nama_daerah');
                $daerah->deskripsi      =   $request->input('deskripsi');

                $result                 =   $daerah->save();

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
      $daerah    =   Daerah::findOrFail($id);

      $response  =   $daerah->delete();

      return redirect()->route('daerah');

      return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
    }
}
