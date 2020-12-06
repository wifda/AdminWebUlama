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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth'], function () {
	//Route::resource('page', 'PageController', ['except' => ['show']]);
	Route::get('/ulama/search/', 'DataUlamaController@index');
});
// Route::get('ulama/search/', 'PageController@index');
// Route::get('ulama/search/{nama_ulama}', 'DataUlamaController@search');