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

/////////////////////////////////////// AUTH ////////////////////////////////////////////////////

Auth::routes(['register' => false]);
Route::get('/registro/email', 'AuthController@emailVerify');

Route::group(['middleware' => ['login']], function () {
	Route::get('/ingresar', 'AuthController@loginForm')->name('ingresar');
	Route::get('/registro', 'AuthController@registerForm')->name('registro');
	Route::get('/recuperar', 'AuthController@recoveryForm')->name('recuperar');
	Route::get('/restaurar/{slug}', 'AuthController@resetForm')->name('restaurar');
	Route::post('/ingresar', 'AuthController@login')->name('login.custom');
	Route::post('/registro', 'AuthController@register')->name('register.custom');
	Route::post('/recuperar', 'AuthController@recovery')->name('recovery.custom');
	Route::post('/restaurar', 'AuthController@reset')->name('reset.custom');
});

Route::group(['middleware' => ['session_verify']], function () {
	Route::post('/salir', 'AuthController@logout')->name('logout.custom');

	/////////////////////////////////////////////// WEB ////////////////////////////////////////////////
	Route::get('/', 'WebController@index')->name('home');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
	/////////////////////////////////////// ADMIN ///////////////////////////////////////////////////

	// Inicio
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::get('/admin/perfil', 'AdminController@profile')->name('profile');
	Route::get('/admin/perfil/editar', 'AdminController@profileEdit')->name('profile.edit');
	Route::put('/admin/perfil/', 'AdminController@profileUpdate')->name('profile.update');

	// Administradores
	Route::get('/admin/administradores', 'AdministratorController@index')->name('administradores.index');
	Route::get('/admin/administradores/registrar', 'AdministratorController@create')->name('administradores.create');
	Route::post('/admin/administradores', 'AdministratorController@store')->name('administradores.store');
	Route::get('/admin/administradores/{slug}', 'AdministratorController@show')->name('administradores.show');
	Route::get('/admin/administradores/{slug}/editar', 'AdministratorController@edit')->name('administradores.edit');
	Route::put('/admin/administradores/{slug}', 'AdministratorController@update')->name('administradores.update');
	Route::delete('/admin/administradores/{slug}', 'AdministratorController@destroy')->name('administradores.delete');
	Route::put('/admin/administradores/{slug}/activar', 'AdministratorController@activate')->name('administradores.activate');
	Route::put('/admin/administradores/{slug}/desactivar', 'AdministratorController@deactivate')->name('administradores.deactivate');

	

	// Home-page
	Route::get('/admin/home-page', 'HomeController@index')->name('home.index');
	Route::get('/admin/home-page/registrar', 'HomeController@create')->name('home.create');
	Route::post('/admin/home-page', 'HomeController@store')->name('home.store');
	Route::get('/admin/home-page/{slug}/editar', 'HomeController@edit')->name('home.edit');
	Route::put('/admin/home-page/{slug}', 'HomeController@update')->name('home.update');
	Route::delete('/admin/home-page/{slug}', 'HomeController@destroy')->name('home.delete');
	Route::put('/admin/home-page/{slug}/activar', 'HomeController@activate')->name('home.activate');
	Route::put('/admin/home-page/{slug}/desactivar', 'HomeController@deactivate')->name('home.deactivate');
	

	// About Us
	Route::get('/admin/about', 'AboutUsController@index')->name('about.index');
	Route::get('/admin/about/registrar', 'AboutUsController@create')->name('about.create');
	Route::post('/admin/about', 'AboutUsController@store')->name('about.store');
	Route::get('/admin/about/{slug}/editar', 'AboutUsController@edit')->name('about.edit');
	Route::put('/admin/about/{slug}', 'AboutUsController@update')->name('about.update');
	Route::delete('/admin/about/{slug}', 'AboutUsController@destroy')->name('about.delete');
	Route::put('/admin/about/{slug}/activar', 'AboutUsController@activate')->name('about.activate');
	Route::put('/admin/about/{slug}/desactivar', 'AboutUsController@deactivate')->name('about.deactivate');

	// Excursions
	Route::get('/admin/excursion', 'ExcursionController@index')->name('excursion.index');
	Route::get('/admin/excursion/registrar', 'ExcursionController@create')->name('excursion.create');
	Route::post('/admin/excursion', 'ExcursionController@store')->name('excursion.store');
	Route::get('/admin/excursion/{slug}/editar', 'ExcursionController@edit')->name('excursion.edit');
	Route::put('/admin/excursion/{slug}', 'ExcursionController@update')->name('excursion.update');
	Route::delete('/admin/excursion/{slug}', 'ExcursionController@destroy')->name('excursion.delete');
	Route::put('/admin/excursion/{slug}/activar', 'ExcursionController@activate')->name('excursion.activate');
	Route::put('/admin/excursion/{slug}/desactivar', 'ExcursionController@deactivate')->name('excursion.deactivate');

	//Galery
	Route::get('/admin/galery', 'GaleryController@index')->name('galery.index');
	Route::get('/admin/galery/registrar', 'GaleryController@create')->name('galery.create');
	Route::post('/admin/galery', 'GaleryController@store')->name('galery.store');
	Route::get('/admin/galery/{slug}/editar', 'GaleryController@edit')->name('galery.edit');
	Route::put('/admin/galery/{slug}', 'GaleryController@update')->name('galery.update');
	Route::delete('/admin/galery/{slug}', 'GaleryController@destroy')->name('galery.delete');
	Route::put('/admin/galery/{slug}/activar', 'GaleryController@activate')->name('galery.activate');
	Route::put('/admin/galery/{slug}/desactivar', 'GaleryController@deactivate')->name('galery.deactivate');

	//Category
	Route::get('/admin/category', 'CategoryController@index')->name('category.index');
	Route::get('/admin/category/registrar', 'CategoryController@create')->name('category.create');
	Route::post('/admin/category', 'CategoryController@store')->name('category.store');
	Route::get('/admin/category/{slug}/editar', 'CategoryController@edit')->name('category.edit');
	Route::put('/admin/category/{slug}', 'CategoryController@update')->name('category.update');
	Route::delete('/admin/category/{slug}', 'CategoryController@destroy')->name('category.delete');
	Route::put('/admin/category/{slug}/activar', 'CategoryController@activate')->name('category.activate');
	Route::put('/admin/category/{slug}/desactivar', 'CategoryController@deactivate')->name('category.deactivate');

	//Activity
	Route::get('/admin/activity', 'ActivityController@index')->name('activity.index');
	Route::get('/admin/activity/registrar', 'ActivityController@create')->name('activity.create');
	Route::post('/admin/activity', 'ActivityController@store')->name('activity.store');
	Route::get('/admin/activity/{slug}/editar', 'ActivityController@edit')->name('activity.edit');
	Route::put('/admin/activity/{slug}', 'ActivityController@update')->name('activity.update');
	Route::delete('/admin/activity/{slug}', 'ActivityController@destroy')->name('activity.delete');
	Route::put('/admin/activity/{slug}/activar', 'ActivityController@activate')->name('activity.activate');
	Route::put('/admin/activity/{slug}/desactivar', 'ActivityController@deactivate')->name('activity.deactivate');

	//Transfer
	Route::get('/admin/transfer', 'TransferController@index')->name('transfer.index');
	Route::get('/admin/transfer/registrar', 'TransferController@create')->name('transfer.create');
	Route::post('/admin/transfer', 'TransferController@store')->name('transfer.store');
	Route::get('/admin/transfer/{slug}/editar', 'TransferController@edit')->name('transfer.edit');
	Route::put('/admin/transfer/{slug}', 'TransferController@update')->name('transfer.update');
	Route::delete('/admin/transfer/{slug}', 'TransferController@destroy')->name('transfer.delete');
	Route::put('/admin/transfer/{slug}/activar', 'TransferController@activate')->name('transfer.activate');
	Route::put('/admin/transfer/{slug}/desactivar', 'TransferController@deactivate')->name('transfer.deactivate');

	//Office
	Route::get('/admin/office', 'OfficeController@index')->name('office.index');
	Route::get('/admin/office/registrar', 'OfficeController@create')->name('office.create');
	Route::post('/admin/office', 'OfficeController@store')->name('office.store');
	Route::get('/admin/office/{slug}/editar', 'OfficeController@edit')->name('office.edit');
	Route::put('/admin/office/{slug}', 'OfficeController@update')->name('office.update');
	Route::delete('/admin/office/{slug}', 'OfficeController@destroy')->name('office.delete');
	Route::put('/admin/office/{slug}/activar', 'OfficeController@activate')->name('office.activate');
	Route::put('/admin/office/{slug}/desactivar', 'OfficeController@deactivate')->name('office.deactivate');

	//Attention
	Route::get('/admin/attention', 'AttentionController@index')->name('attention.index');
	Route::get('/admin/attention/registrar', 'AttentionController@create')->name('attention.create');
	Route::post('/admin/attention', 'AttentionController@store')->name('attention.store');
	Route::get('/admin/attention/{slug}/editar', 'AttentionController@edit')->name('attention.edit');
	Route::put('/admin/attention/{slug}', 'AttentionController@update')->name('attention.update');
	Route::delete('/admin/attention/{slug}', 'AttentionController@destroy')->name('attention.delete');
	Route::put('/admin/attention/{slug}/activar', 'AttentionController@activate')->name('attention.activate');
	Route::put('/admin/attention/{slug}/desactivar', 'AttentionController@deactivate')->name('attention.deactivate');

	//Reservation
	Route::get('/admin/reservation', 'ReservationController@index')->name('reservation.index');
	Route::get('/admin/reservation/registrar', 'ReservationController@create')->name('reservation.create');
	Route::post('/admin/reservation', 'ReservationController@store')->name('reservation.store');
	Route::get('/admin/reservation/{slug}/editar', 'ReservationController@edit')->name('reservation.edit');
	Route::put('/admin/reservation/{slug}', 'ReservationController@update')->name('reservation.update');
	Route::delete('/admin/reservation/{slug}', 'ReservationController@destroy')->name('reservation.delete');
	Route::put('/admin/reservation/{slug}/activar', 'ReservationController@activate')->name('reservation.activate');
	Route::put('/admin/reservation/{slug}/desactivar', 'ReservationController@deactivate')->name('reservation.deactivate');
});