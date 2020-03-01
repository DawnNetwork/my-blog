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


Route::group(['middleware' => ['web']],function () {
    Route::get('/', 'Home\IndexController@index');
    Route::get('/cate/{cate_id}', 'Home\IndexController@cate');
    Route::get('/a/{art_id}', 'Home\IndexController@article');
    
	Route::any('admin/login','Admin\LoginController@login');
	Route::get('admin/code','Admin\LoginController@code');
	Route::get('admin/getcode','Admin\LoginController@getcode');
});
Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function () {
	Route::get('index','IndexController@index');
	Route::get('info','IndexController@info');
	Route::get('quit','LoginController@quit');
	Route::any('pass','IndexController@pass');

	Route::post('cate/changeorder', 'CategroyController@changeOrder');
	Route::resource('categroy', 'CategroyController');
	Route::resource('article', 'ArticleController');

    Route::post('links/changeorder', 'LinkController@changeOrder');
    Route::resource('links', 'LinkController');

    Route::post('navs/changeorder', 'NavController@changeOrder');
    Route::resource('navs', 'NavController');

    Route::get('config/putfile', 'ConfigController@putFile');
    Route::post('config/changecontent', 'ConfigController@changeContent');
    Route::post('config/changeorder', 'ConfigController@changeOrder');
    Route::resource('config', 'ConfigController');

	Route::any('upload', 'CommonController@upload');
});

