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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', function ($site_id = '3') {
//     return view('index')->with('site_id', $site_id);
// });
Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/{user}/{id}', 'TestController@show');
//Route::get('/showsite/{user}/{site_id}', 'TestController@showsite')->name('showsite');
Route::get('/edit/{username}/{site_id}', 'TestController@showsiteedit')->name('show_site_edit');
Route::get('/s/{username}/{next_site_id}', 'TestController@newsite')->name('new_site');
Route::get('/show/{username}/{site_id}', 'TestController@showsite')->name('show_site');
Route::get('/deletesite/{site_id}', 'TestController@deletesite')->name('delete_site');


Route::post('/content/store/{id}', 'ContentPageController@store')->name('content.store');
Route::get('/content/load/{id}', 'ContentPageController@load')->name('content.load');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
