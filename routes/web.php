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

Route::get('login',['as'=>'getLogin','uses'=>'Auth\LoginController@getLogin']);
Route::post('login',['as'=>'postLogin','uses'=>'Auth\LoginController@postLogin']);

Route::get('register',['as'=>'getRegister','uses'=>'Auth\RegisterController@getRegister']);
Route::post('register',['as'=>'postRegister','uses'=>'Auth\RegisterController@postRegister']);

//Route::get('forgot',['as'=>'getForgot','uses'=>'Client\ForgotPasswordController@getForgot']);
//Route::post('forgot',['as'=>'postForgot','uses'=>'Auth\ForgotPasswordController@postForgot']);

//Route::get('reset',['as'=>'getReset','uses'=>'Client\ResetPasswordController@getReset']);
//Route::post('reset',['as'=>'postReset','uses'=>'Auth\ResetPasswordController@postReset']);

Route::get('home',['as'=>'Home','uses'=>'Client\HomeController@showHome']);

Route::get('mystore/{state}',['as'=>'MyStore','uses'=>'Client\HomeController@showMyStore']);

Route::get('order-detail/{id}',['as'=>'orderDetail','uses'=>'Client\HomeController@showOrderDetail']);
Route::get('stock-detail/{id}',['as'=>'stockDetail','uses'=>'Client\HomeController@showStockDetail']);

Route::post('order-detail/{id}',['as'=>'postReview','uses'=>'Client\HomeController@postReview']);

Route::get('profile/{user_name}', ['as'=>'profile', 'uses'=>'Client\ClientController@profileDetail']);
//Route::get('profile/{user_name}', ['as'=>'editprofile', 'uses'=>'Client\ClientController@postProfile']);

Route::get('map',['as'=>'Map','uses'=>'Client\HomeController@showMap']);

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

Route::get('listbycate/{id}/{state}',['as'=>'listByCate','uses'=>'Client\HomeController@listByCate']);

//user upload
Route::get('upload',['as'=>'getupload','uses'=>'Client\ClientController@getUpload']);
Route::post('upload',['as'=>'postupload','uses'=>'Client\ClientController@postUpload']);

//user edit, delete
Route::get('delete/{state}--{id}',['as'=>'getDeleteProduct','uses'=>'Client\ClientController@getDeleteProduct']);

Route::get('test',['uses'=>'Client\HomeController@test']);

Route::get('search',['uses'=>'SearchController@getSearch','as'=>'search']);

//Route::resource('queries', 'QueryController');
// Change favorite
Route::get('favorite/{state}--{id}',['as'=>'favorite','uses'=>'Client\HomeController@changeFavorite']);
Route::get('mymark',['as'=>'myMark','uses'=>'Client\HomeController@showMark']);

Route::get('match/{state}--{id}',['as'=>'getMatch','uses'=>'Client\HomeController@getMatch']);

Route::get('logout',['as'=>'logout','uses'=>'Auth\LoginController@getLogout'])->middleware('auth');

Route::get('suggestprice',['as'=>'suggestprice','uses'=>'Client\SuggestController@suggestPrice']);