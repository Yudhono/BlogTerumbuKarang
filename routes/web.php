<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('tesa/{id?}', 'welcomeEnduser@getProjectSingle')->name('tung');

Route::get('/single', function () {
    return view('projects_single');
});

Route::get('/index', ['uses' => 'welcomeEnduser@getIndex', 'as' => 'layouts.master']);


  Route::get('/', function () {
      return view('welcome');
  });

  // Route::get('/index', function () {
  //     return view('layouts.master');
  // });

  //Route::get('/index', ['uses' => 'enduserPengetahuanController@index', 'as' => 'layouts.master']);
  Route::get('searching', 'projects_newPage2_Controller@search')->name('searching');
  Route::get('projects_new', ['as' => 'projects_newPage2', 'uses' => 'projects_newPage2_Controller@getIndex']);
  Route::get('dae/{daerah_id}', ['as' => 'projects_tampilberdasarkan_daerah', 'uses' => 'projects_new_page_Controller@tampilBerdasarkan_daerah'])->where('id', '[\w\d\-\_]+');



  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');
  Route::group(['middleware' => ['auth']], function() {
      Route::resource('roles','RoleController');
      Route::resource('users','UserController');

      Route::get('/create', 'WelcomeController@createV')->name('buat');

      Route::get('/createP', 'pengetahuanController@createV')->name('buatP');

      Route::get('/createB', 'bannerController@createV')->name('buatB');

      Route::get('/createProject', 'projectController@createV')->name('buatPR');

      Route::get('createPR', 'projectController@getDaerahID');

      Route::get('/createD', 'DaerahController@createV')->name('buatD');

      Route::get('/createOP', 'our_projectController@createV')->name('buatOP');

      //=====================Routenya WelcomeController====================================
      Route::post('indeks', 'WelcomeController@create')->name('cInput');
      //Route::get('indeks', ['uses' => 'WelcomeController@index', 'as' => 'admin.manageWelcome.index']);
      Route::get('indeks', 'WelcomeController@index')->name('indeks');
      Route::delete('create/delete/{id}', 'WelcomeController@destroy')->name('cDelete');
      Route::get('create/{id?}', 'WelcomeController@show')->name('lihat');
      Route::get('edit/{id?}', 'WelcomeController@edit')->name('halEdit');
      Route::post('create/{id?}', 'WelcomeController@update')->name('cUpdate');
      //====================================================================================

      //=====================Routenya PengetahuanController====================================
      Route::post('pengetahuan', 'PengetahuanController@create')->name('pInput');
      //Route::get('indeks', ['uses' => 'WelcomeController@index', 'as' => 'admin.manageWelcome.index']);
      Route::get('pengetahuan', 'PengetahuanController@index')->name('pengetahuan');
      Route::delete('pengetahuan/delete/{id}', 'PengetahuanController@destroy')->name('pDelete');
      Route::get('pengetahuan/{id?}', 'PengetahuanController@show')->name('plihat');
      Route::get('editP/{id?}', 'PengetahuanController@edit')->name('phalEdit');
      Route::post('pengetahuan/{id?}', 'PengetahuanController@update')->name('pUpdate');
      //====================================================================================

      //=====================Routenya bannerController====================================
      Route::post('banner', 'bannerController@create')->name('bInput');
      //Route::get('indeks', ['uses' => 'WelcomeController@index', 'as' => 'admin.manageWelcome.index']);
      Route::get('banner', 'bannerController@index')->name('banner');
      Route::delete('banner/delete/{id}', 'bannerController@destroy')->name('bDelete');
      Route::get('banner/{id?}', 'bannerController@show')->name('blihat');
      Route::get('editB/{id?}', 'bannerController@edit')->name('bhalEdit');
      Route::post('banner/{id?}', 'bannerController@update')->name('bUpdate');
      //====================================================================================

      //=====================Routenya projectController====================================
      Route::post('project', 'projectController@create')->name('prInput');
      //Route::get('indeks', ['uses' => 'WelcomeController@index', 'as' => 'admin.manageWelcome.index']);
      Route::get('project', 'projectController@index')->name('project');
      Route::delete('project/delete/{id}', 'projectController@destroy')->name('prDelete');
      Route::get('project/{id?}', 'projectController@show')->name('prlihat');
      Route::get('editPr/{id?}', 'projectController@edit')->name('prhalEdit');
      Route::post('project/{id?}', 'projectController@update')->name('prUpdate');

      Route::get('projects/{id?}', ['as' => 'projects_single', 'uses' => 'welcomeEnduser@getProjectSingle'])->where('id', '[\w\d\-\_]+');
      //====================================================================================

      //=====================Routenya daerahController====================================
      Route::post('daerah', 'DaerahController@create')->name('dInput');
      //Route::get('indeks', ['uses' => 'WelcomeController@index', 'as' => 'admin.manageWelcome.index']);
      Route::get('daerah', 'DaerahController@index')->name('daerah');
      Route::delete('daerah/delete/{id}', 'DaerahController@destroy')->name('dDelete');
      Route::get('daerah/{id?}', 'DaerahController@show')->name('dlihat');
      Route::get('editD/{id?}', 'DaerahController@edit')->name('dhalEdit');
      Route::post('daerah/{id?}', 'DaerahController@update')->name('dUpdate');
      //====================================================================================

      //=====================Routenya our_projectController====================================
      Route::post('ourPro', 'our_projectController@create')->name('oPInput');
      //Route::get('indeks', ['uses' => 'WelcomeController@index', 'as' => 'admin.manageWelcome.index']);
      Route::get('ourPro', 'our_projectController@index')->name('ourPro');
      Route::delete('ourPro/delete/{id}', 'our_projectController@destroy')->name('oPDelete');
      Route::get('ourPro/{id?}', 'our_projectController@show')->name('oPlihat');
      Route::get('editoP/{id?}', 'our_projectController@edit')->name('oPhalEdit');
      Route::post('ourPro/{id?}', 'our_projectController@update')->name('oPUpdate');
      //====================================================================================

      //=====================Routenya buat comment==========================================
      Route::post('comments/{project_id}', ['uses' => 'commentsController@store', 'as' => 'comments.store']);
    	Route::get('comments/{id}/edit', ['uses' => 'commentsController@edit', 'as' => 'comments.edit']);
    	Route::post('comments/rubah/{id}', ['uses' => 'commentsController@update', 'as' => 'comments.update']);
    	Route::delete('comments/{id}', ['uses' => 'commentsController@destroy', 'as' => 'comments.destroy']);
    	Route::get('comments/{id}/delete', ['uses' => 'commentsController@delete', 'as' => 'comments.delete']);
      //====================================================================================

      Route::get('postingan/chart/{startDate}/{endDate}','reportController@chart'); //-- harusnya get
    // Route::get('/report1', ['as' => 'admin.report.report1', 'uses' => 'reportController@chart'], function(){
    //   return view('admin.report.report1');
    // });
    Route::get('tampil','reportController@tampil');

      Route::get('/report1', function () {
          return view('admin.report.report1');
      });
  });
