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
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

// Password Reset Routes
Route::get('password/reset',['as'=>'password.request','uses'=>'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email',['as'=>'password.email','uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}',['as'=>'password.reset','uses'=>'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset',['uses'=>'Auth\ResetPasswordController@reset']);

Route::get('home',['as'=>'Home','uses'=>'Client\HomeController@showHome']);

Route::get('mystore',['as'=>'MyStore','uses'=>'Client\HomeController@showMyStore'])->middleware('auth');

Route::get('order-detail/{id}',['as'=>'orderDetail','uses'=>'Client\HomeController@showOrderDetail']);
Route::get('stock-detail/{id}',['as'=>'stockDetail','uses'=>'Client\HomeController@showStockDetail']);

Route::post('order-detail/{id}',['as'=>'postReview','uses'=>'Client\HomeController@postReview']);

Route::get('profile/{user_name}', ['as'=>'profile', 'uses'=>'Client\ClientController@profileDetail'])->middleware('auth');
Route::post('update-profile/{user_id}', ['as'=>'editProfile', 'uses'=>'Client\ClientController@postProfile']);

Route::get('map',['as'=>'Map','uses'=>'Client\HomeController@showMap']);
Route::get('mapStockInfoDetail/{id}',['as'=>'mapStockInfoDetail','uses'=>'Client\HomeController@showMapStockInfoDetail']);
Route::get('mapOrderInfoDetail/{id}',['as'=>'mapOrderInfoDetail','uses'=>'Client\HomeController@showMapOrderInfoDetail']);

Route::get('getMatchNotification/{user_id}',['as'=>'getMatchNotification','uses'=>'Client\MatchNotificationController@getMatchNotification'])->middleware('auth');
Route::get('readNotification/{type}--{type_noti}--{id}',['as'=>'readNotification','uses'=>'Client\MatchNotificationController@readNotification'])->middleware('auth');
Route::get('markAllNotificationAsRead',['as'=>'markAllNotificationAsRead','uses'=>'Client\MatchNotificationController@markAllNotificationAsRead'])->middleware('auth');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function () {
	Route::group(['prefix'=>'cate'],function () {
		Route::get('list',['as'=>'admin.cate.list','uses'=>'Admin\CateController@getList']);
		// Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'Admin\CateController@getAdd']);
		// Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'Admin\CateController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'Admin\CateController@getDelete']);
		// Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'Admin\CateController@getEdit']);
		// Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'Admin\CateController@postEdit']);
	});
	Route::group(['prefix'=>'stock'],function () {
		Route::get('list',['as'=>'admin.stock.list','uses'=>'Admin\StockController@getList']);
		Route::get('delete/{id}',['as'=>'admin.stock.getDelete','uses'=>'Admin\StockController@getDelete']);
	});
	Route::group(['prefix'=>'order'],function () {
		Route::get('list',['as'=>'admin.order.list','uses'=>'Admin\OrderController@getList']);
		Route::get('delete/{id}',['as'=>'admin.order.getDelete','uses'=>'Admin\OrderController@getDelete']);
	});
	Route::group(['prefix'=>'user'],function () {
		Route::get('list',['as'=>'admin.user.list','uses'=>'Admin\UserController@getList']);
		// Route::get('add',['as'=>'admin.user.getAdd','uses'=>'Admin\UserController@getAdd']);
		// Route::post('add',['as'=>'admin.user.postAdd','uses'=>'Admin\UserController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'Admin\UserController@getDelete']);
		// Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'Admin\UserController@getEdit']);
		// Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'Admin\UserController@postEdit']);
	});
});

Route::get('listbycate/{id}',['as'=>'listByCate','uses'=>'Client\HomeController@listByCate']);

//user upload
Route::get('upload',['as'=>'getupload','uses'=>'Client\ClientController@getUpload'])->middleware('auth');
Route::post('upload',['as'=>'postupload','uses'=>'Client\ClientController@postUpload'])->middleware('auth');

//user edit, delete
Route::get('delete/{state}--{id}',['as'=>'getDeleteProduct','uses'=>'Client\ClientController@getDeleteProduct'])->middleware('auth');

Route::get('search',['uses'=>'SearchController@getSearch','as'=>'search']);

//Route::resource('queries', 'QueryController');
// Change favorite
Route::get('favorite/{state}--{id}',['as'=>'favorite','uses'=>'Client\HomeController@changeFavorite'])->middleware('auth');
Route::get('mymark',['as'=>'myMark','uses'=>'Client\HomeController@showMark'])->middleware('auth');

Route::get('match/{state}--{id}',['as'=>'getMatch','uses'=>'Client\HomeController@getMatch'])->middleware('auth');

Route::get('logout',['as'=>'logout','uses'=>'Auth\LoginController@getLogout'])->middleware('auth');

//Noti
Route::get('/mark-noti-as-read/{notiId}/{state}--{id}', ['as' => 'markNotiAsRead', 'uses' => 'NotificationController@delete'])->middleware('auth');

//Paypal:
Route::resource('payment', 'PaymentController');

//Testing function
Route::get('test','Client\ClientController@test');