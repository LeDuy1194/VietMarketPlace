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

Route::get('','Client\HomeController@showHome');

Route::get('login',['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
Route::post('login',['as'=>'login','uses'=>'Auth\AuthController@postLogin']);

Route::get('reset',['as'=>'Reset','uses'=>'Client\HomeController@showReset']);

Route::get('register',['as'=>'Register','uses'=>'Client\HomeController@showRegister']);

Route::get('homepage',['as'=>'Home','uses'=>'Client\HomeController@showHome']);

Route::get('mystore',['as'=>'MyStore','uses'=>'Client\HomeController@showMyStore']);

Route::get('listorder',['as'=>'OrderDetail','uses'=>'Client\HomeController@showOrderDetail']);

Route::get('profile',['as'=>'Profile','uses'=>'Client\HomeController@showProfile']);

Route::get('upload',['as'=>'Upload','uses'=>'Client\HomeController@showUpload']);

Route::get('map',['as'=>'Map','uses'=>'Client\HomeController@showMap']);

Route::get('test',function() {
	return view('admin.cate.add');
});

Route::group(['prefix'=>'admin'],function () {
	Route::group(['prefix'=>'cate'],function () {
		Route::get('list',['as'=>'admin.cate.list','uses'=>'Admin\CateController@getList']);
		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'Admin\CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'Admin\CateController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'Admin\CateController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'Admin\CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'Admin\CateController@postEdit']);
	});
	Route::group(['prefix'=>'stock'],function () {
		Route::get('add',['as'=>'admin.stock.getAdd','uses'=>'Admin\StockController@getAdd']);
		Route::post('add',['as'=>'admin.stock.postAdd','uses'=>'Admin\StockController@postAdd']);
	});
});