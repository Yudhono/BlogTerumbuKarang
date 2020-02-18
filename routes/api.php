<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');
//
// Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
//     //    Route::resource('task', 'TasksController');
//
//     //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
//     #adminlte_api_routes
// });

Route::post('register', 'API\RegisterController@register');


Route::middleware('auth:api')->group( function () {
	Route::resource('daerah', 'API\DaerahController');

	Route::post('pengetahuan', 'API\PengeController@create')->name('pInput');
	//Route::get('indeks', ['uses' => 'WelcomeController@index', 'as' => 'admin.manageWelcome.index']);
	Route::get('pengetahuan', 'API\PengeController@index')->name('pengetahuan');
	Route::delete('pengetahuan/delete/{id}', 'API\PengeController@destroy')->name('pDelete');
	Route::get('pengetahuan/{id?}', 'API\PengeController@show')->name('plihat');
	Route::get('editP/{id?}', 'API\PengeController@edit')->name('phalEdit');
	Route::post('pengetahuan/{id?}', 'API\PengeController@update')->name('pUpdate');
});
