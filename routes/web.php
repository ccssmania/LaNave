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