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

//Route::get('/', function () {
    //return view('welcome');
//});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    Route::post('profile/create', 'Admin\ProfileController@create');  
    Route::get('profile/create', 'Admin\ProfileController@add'); 
    Route::get('profile/edit', 'Admin\ProfileController@edit'); 
    Route::post('profile/edit', 'Admin\ProfileController@update'); 
    Route::get('profile', 'Admin\ProfileController@index'); 
    Route::get('profile/delete', 'Admin\ProfileController@delete');
    
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth'); // 追記
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth'); // 追記
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth'); // 追記
    Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth'); // 追記
//Laravel 19のカリキュラムにて追記
});
Route::get('/', 'NewsController@index');

//↓2021年12月4日（土）23：30　応用課題。
//「/profile にアクセスが来たら ProfileController/index Action に渡す」に対応
Route::get('/profile', 'ProfileController@index');

//  2021/12/17　URL開けれるかの確認結果
//  /admin/news/create→OK
//  /admin/profile/create→OK
//  /admin/profile/edit→NG  ★
//  /admin/profile→OK
//  /admin/news→OK
//  /admin/news/edit→OK
//  /admin/new/delete→OK
//  /profile→OK
//  /→OK