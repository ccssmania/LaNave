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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user', 'UserController@index');
Route::get('/about', 'HomeController@about');
Route::get('/services', 'HomeController@services');
Route::get('/contact', 'HomeController@contact');


//event for fullcalendar
Route::get('/events', 'CalendarController@events');



//product Routes

Route::get('/products', 'ProductController@index');
Route::get('/products/create','ProductController@create');
Route::post('/product', 'ProductController@store');
Route::get('/product/{id}','HomeController@showProduct');
Route::get('/product/{id}/edit','ProductController@edit');
Route::post('/product/edit/{id}','ProductController@update');
Route::post('/product/delete/{id}', 'ProductController@destroy');

//perfil routes
Route::get('/perfil', 'PerfilController@index');
Route::get('/perfil/edit/{id}', 'PerfilController@edit');
Route::post('/perfil/edit/{id}', 'PerfilController@update');
Route::post('/perfil/images', 'PerfilController@images');
Route::get('/perfil/employe/create', 'PerfilController@createEmploye');
Route::post('/perfil/employe/create', 'PerfilController@storeEmploye');
Route::get('/perfil/employe/edit/{id}', 'PerfilController@editEmploye');
Route::post('/perfil/employe/edit/{id}', 'PerfilController@updateEmploye');
Route::get('/perfil/contact/edit/{id}', 'PerfilController@editContact');
Route::post('/perfil/contact/edit/{id}', 'PerfilController@updateContact');

//mensaje de contacto
Route::post('/contactus','ContactUsController@message');

//calendar routes

Route::get('/calendar', 'HomeController@google');
Route::resource('tasks', 'TasksController');
Route::post('/tasks/{id}/update', 'TasksController@update');
Route::post('/calendar/changeSize', 'CalendarController@changeSize');
Route::post('/calendar/changeDate', 'CalendarController@changeDate');
Route::post('/task/{id}/delete','TasksController@destroy');

//orders

Route::get('/order/{id}', 'OrderController@order');
Route::post('/order', 'OrderController@store');
Route::get('/order/{id}/delete','OrderController@reject');
Route::get('/orders','OrderController@index');


//cancel order From Client
Route::get('/order/userCancel/{id}/{token}','HomeController@cancelOrder');

//notifications

Route::get('/notifications', 'NotificationController@index');
Route::get('/notifications/{id}', 'NotificationController@show');
Route::get('/notifications/{id}/mark', 'NotificationController@mark');
Route::get('/notifications/{id}/order', 'NotificationController@order');
Route::get('/notifications/{id}/contactus', 'NotificationController@contact');
Route::post('/notifications/response/{id}', 'NotificationController@message');
Route::get('/notifications/delete/{id}', 'NotificationController@delete');

//path to find image
Route::get('products/images/{filename}',function($filename){
	$path = storage_path("app/images/$filename");


	if(!\File::exists($path)) abort(404);
	$file = \File::get($path);
	$type = \File::mimeType($path);

	$response = Response::make($file,200);
	$response->header("Content-Type", $type);

	return $response;
});

Route::get('/images/{filename}',function($filename){
	$path = storage_path("app/images/$filename");


	if(!\File::exists($path)) abort(404);
	$file = \File::get($path);
	$type = \File::mimeType($path);

	$response = Response::make($file,200);
	$response->header("Content-Type", $type);

	return $response;
});

//Access to storage js files
Route::get('/fullcalendar/{filename}',function($filename){
	if($filename == "es.js"){
		$path = storage_path("app/fullcalendar/locale/$filename");
	}
	else{
		$path = storage_path("app/fullcalendar/$filename");
	}

	if(!\File::exists($path)) abort(404);
	$file = \File::get($path);
	$type = \File::mimeType($path);

	$response = Response::make($file,200);
	if($filename == "fullcalendar.min.css")
		$response->header("Content-Type", 'text/css');
	else
		$response->header("Content-Type", $type);
	return $response;
});
