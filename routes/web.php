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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
	Route::post('{page}', ['as' => 'page.tambahdata', 'uses' => 'PageController@tambahdata']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/ulama/edit/{ulama_id}', 'PageController@edit');
	Route::post('/ulama/updateform', 'PageController@update');
	Route::get('/ulama/editbiografi/{ulama_id}', 'PageController@editbiografi');
	Route::post('/ulama/updateformbio', 'PageController@updatebiografi');
	Route::get('/ulama/hapus/{ulama_id}', 'PageController@hapus');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
