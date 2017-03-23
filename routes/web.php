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

Route::get('/home', 'HomeController@index')->name('app.home');

Route::get('/profile/{slug?}', 'HomeController@profile')->name('app.profile');

Route::group(['prefix'=>"admin","as"=>"admin.","middleware"=>['auth','admin']],function(){
      Route::get('/', 'Admin\IndexController@index')->name('index');

      Route::resource('post','Admin\PostController');

});
