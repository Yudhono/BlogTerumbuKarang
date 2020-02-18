<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Daerah;
use Purifier;
use Validator;


class DaerahController extends BaseController
{
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

    public function index()
    {
        $daerah = Daerah::all();


        return $this->sendResponse($daerah->toArray(), 'Daerah retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        //return redirect()->route('daerah');

        return $this->sendResponse($daerah->toArray(), 'Daerah created successfully.');
    }



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


        if (is_null($daerah)) {
            return $this->sendError('Daerah not found.');
        }


        return $this->sendResponse($daerah->toArray(), 'Daerah retrieved successfully.');
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

                //return back();

                return $this->sendResponse($daerah->toArray(), 'Daerah updated successfully.');
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
    public function destroy(Daerah $daerah)
    {
        $daerah->delete();


        return $this->sendResponse($daerah->toArray(), 'Daerah deleted successfully.');
    }
}
