<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Banner;
use Purifier;
use Session;

class bannerController extends Controller
{

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
    return view('admin.manageBanner.create');
  }

  public function index()
  {
    $banners =  Banner::orderBy('id', 'asc')->get();

    $nama = [];
    $i = 0;
    foreach ($banners as $each) {
      $nama[$i]['image'] = basename($each->image);
      $nama[$i]['title'] = basename($each->title);
      $nama[$i]['subtitle_1'] = basename($each->subtitle_1);
      $nama[$i]['subtitle_2'] = basename($each->subtitle_2);
      $nama[$i]['updated_at']  = basename($each->updated_at);
      $nama[$i]['id']    = basename($each->id);

      $i++;
    }

    //return json_encode($banners);
    return view('admin.manageBanner.index')->withBanners($banners)->withNama($nama);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function show($banner_id)
   {
       $banner =  Banner::find($banner_id);

       $nama = [];
       $nama['image']       = basename($banner->image);
       $nama['title']       = basename($banner->title);
       $nama['subtitle_1']   = basename($banner->subtitle_1);
       $nama['subtitle_2']   = basename($banner->subtitle_2);
       $nama['updated_at']  = basename($banner->updated_at);
       $nama['created_at']  = basename($banner->created_at);
       $nama['id']          = basename($banner->id);

       //return json_encode($banner);
       return view('admin.manageBanner.show')->withBanner($banner)->withNama($nama);
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
        'subtitle_1'   => 'required|max:255',
        'subtitle_2'   => 'required|max:255',
        'image'        => 'required|mimes:jpeg,png,jpg|max:2048',

    ]);

    if($validator->fails()) {
        $error = $validator->messages()->toJson();

        return response()->json(['status' => 'salah', 'message' => $error]);
    } else {
        $file   =   time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/banner'), $file);
        $path   =   public_path('images/banner/'). $file;

        $banner                =   new Banner;
        $banner->title         =   $request->input('title');
        $banner->subtitle_1    =   $request->input('subtitle_1');
        $banner->subtitle_2    =   $request->input('subtitle_2');
        $banner->image         =   $path;
        $result                =   $banner->save();

        return redirect()->route('banner');

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
    $banner = Banner::find($id);

   return view('admin.manageBanner.update')->withBanner($banner);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $banner_id)
  {
      if (!empty($banner_id)) {
        $validator  =   Validator::make($request->all(), [
            'title'        =>  'required|max:255',
            'subtitle_1'   =>  'required|max:255',
            'subtitle_2'   =>  'required|max:255',
        ]);
        if($validator->fails()) {
            $error  =   $validator->messages()->toJson();

            return response()->json(['status' => 'salah', 'message' => $error]);
        } else {
            $banner             =   Banner::find($banner_id);
            $banner->title      =   $request->input('title');
            $banner->subtitle_1 =   $request->input('subtitle_1');
            $banner->subtitle_2 =   $request->input('subtitle_2');
            $ex_name            =   $banner->image;
            $new_name           =   substr($ex_name, -14);
            if($request->hasFile('image')) {
                if (File::exists(base_path()) ."/public/images/banner/". $new_name) {
                  File::delete(base_path() ."/public/images/banner/". $new_name);
                }
                $file   =   time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/banner'), $file);
                $path   =   public_path('images/banner/'). $file;
                $banner->image = $path;
            }

            $result               =   $banner->save();

            //return back();
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
    $banner         =   Banner::findOrFail($id);
    $filename       =   $banner->image;
    $rest           = substr($filename, -14);
    File::delete(base_path() ."/public/images/banner/". $rest);
    $response       =   $banner->delete();

    return redirect()->route('banenr');

    return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
  }
}
