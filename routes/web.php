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



Route::group(['middleware'=>['web']],function(){
    Route::get('/',[
        'as'=>'home',
        'uses'=>'PostController@index',
    ]);
    //Route::group(['prefix'=>'user','middleware'=>'auth'],function(){
    Route::post('/create',[
        'as'=>'homeupload',
        'uses'=>'PostController@create',
    ]);

    //route for controller
});