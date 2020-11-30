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
Route::post('/excursiones/buscar', 'ExcursionController@search');

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

	// Banners
	Route::get('/admin/banners', 'BannerController@index')->name('banners.index');
	Route::get('/admin/banners/registrar', 'BannerController@create')->name('banners.create');
	Route::post('/admin/banners', 'BannerController@store')->name('banners.store');
	Route::get('/admin/banners/{slug}/editar', 'BannerController@edit')->name('banners.edit');
	Route::put('/admin/banners/{slug}', 'BannerController@update')->name('banners.update');
	Route::delete('/admin/banners/{slug}', 'BannerController@destroy')->name('banners.delete');
	Route::put('/admin/banners/{slug}/activar', 'BannerController@activate')->name('banners.activate');
	Route::put('/admin/banners/{slug}/desactivar', 'BannerController@deactivate')->name('banners.deactivate');

	// Route::post('/admin/banners/videos', 'BannerController@file')->name('banners.store.videos');
	// Route::post('/admin/banners/videos/editar', 'BannerController@fileEdit')->name('banners.edit.videos');
	// Route::post('/admin/banners/videos/eliminar', 'BannerController@fileDestroy')->name('banners.destroy.videos');

	// Quienes Somos
	Route::get('/admin/quienes-somos', 'AboutController@index')->name('nosotros.index');
	Route::get('/admin/quienes-somos/{slug}/editar', 'AboutController@edit')->name('nosotros.edit');
	Route::put('/admin/quienes-somos/{slug}', 'AboutController@update')->name('nosotros.update');

	// Excurciones
	Route::get('/admin/excursiones', 'ExcursionController@index')->name('excursiones.index');
	Route::get('/admin/excursiones/registrar', 'ExcursionController@create')->name('excursiones.create');
	Route::post('/admin/excursiones', 'ExcursionController@store')->name('excursiones.store');
	Route::get('/admin/excursiones/{slug}/editar', 'ExcursionController@edit')->name('excursiones.edit');
	Route::put('/admin/excursiones/{slug}', 'ExcursionController@update')->name('excursiones.update');
	Route::delete('/admin/excursiones/{slug}', 'ExcursionController@destroy')->name('excursiones.delete');
	Route::put('/admin/excursiones/{slug}/activar', 'ExcursionController@activate')->name('excursiones.activate');
	Route::put('/admin/excursiones/{slug}/desactivar', 'ExcursionController@deactivate')->name('excursiones.deactivate');

	// Galeria
	Route::get('/admin/galeria', 'GalleryController@index')->name('galeria.index');
	Route::get('/admin/galeria/registrar', 'GalleryController@create')->name('galeria.create');
	Route::post('/admin/galeria', 'GalleryController@store')->name('galeria.store');
	Route::get('/admin/galeria/{slug}/editar', 'GalleryController@edit')->name('galeria.edit');
	Route::put('/admin/galeria/{slug}', 'GalleryController@update')->name('galeria.update');
	Route::delete('/admin/galeria/{slug}', 'GalleryController@destroy')->name('galeria.delete');
	Route::put('/admin/galeria/{slug}/activar', 'GalleryController@activate')->name('galeria.activate');
	Route::put('/admin/galeria/{slug}/desactivar', 'GalleryController@deactivate')->name('galeria.deactivate');

	// Categorias
	Route::get('/admin/categorias', 'CategoryController@index')->name('categorias.index');
	Route::get('/admin/categorias/registrar', 'CategoryController@create')->name('categorias.create');
	Route::post('/admin/categorias', 'CategoryController@store')->name('categorias.store');
	Route::get('/admin/categorias/{slug}/editar', 'CategoryController@edit')->name('categorias.edit');
	Route::put('/admin/categorias/{slug}', 'CategoryController@update')->name('categorias.update');
	Route::delete('/admin/categorias/{slug}', 'CategoryController@destroy')->name('categorias.delete');
	Route::put('/admin/categorias/{slug}/activar', 'CategoryController@activate')->name('categorias.activate');
	Route::put('/admin/categorias/{slug}/desactivar', 'CategoryController@deactivate')->name('categorias.deactivate');

	// Actividades
	Route::get('/admin/actividades', 'ActivityController@index')->name('actividades.index');
	Route::get('/admin/actividades/registrar', 'ActivityController@create')->name('actividades.create');
	Route::post('/admin/actividades', 'ActivityController@store')->name('actividades.store');
	Route::get('/admin/actividades/{slug}/editar', 'ActivityController@edit')->name('actividades.edit');
	Route::put('/admin/actividades/{slug}', 'ActivityController@update')->name('actividades.update');
	Route::delete('/admin/actividades/{slug}', 'ActivityController@destroy')->name('actividades.delete');
	Route::put('/admin/actividades/{slug}/activar', 'ActivityController@activate')->name('actividades.activate');
	Route::put('/admin/actividades/{slug}/desactivar', 'ActivityController@deactivate')->name('actividades.deactivate');

	// Traslados
	Route::get('/admin/traslados', 'TransferController@index')->name('traslados.index');
	Route::get('/admin/traslados/registrar', 'TransferController@create')->name('traslados.create');
	Route::post('/admin/traslados', 'TransferController@store')->name('traslados.store');
	Route::get('/admin/traslados/{slug}/editar', 'TransferController@edit')->name('traslados.edit');
	Route::put('/admin/traslados/{slug}', 'TransferController@update')->name('traslados.update');
	Route::delete('/admin/traslados/{slug}', 'TransferController@destroy')->name('traslados.delete');
	Route::put('/admin/traslados/{slug}/activar', 'TransferController@activate')->name('traslados.activate');
	Route::put('/admin/traslados/{slug}/desactivar', 'TransferController@deactivate')->name('traslados.deactivate');

	// Atención
	Route::get('/admin/atenciones', 'AttentionController@index')->name('atenciones.index');
	Route::get('/admin/atenciones/registrar', 'AttentionController@create')->name('atenciones.create');
	Route::post('/admin/atenciones', 'AttentionController@store')->name('atenciones.store');
	Route::get('/admin/atenciones/{slug}/editar', 'AttentionController@edit')->name('atenciones.edit');
	Route::put('/admin/atenciones/{slug}', 'AttentionController@update')->name('atenciones.update');
	Route::delete('/admin/atenciones/{slug}', 'AttentionController@destroy')->name('atenciones.delete');
	Route::put('/admin/atenciones/{slug}/activar', 'AttentionController@activate')->name('atenciones.activate');
	Route::put('/admin/atenciones/{slug}/desactivar', 'AttentionController@deactivate')->name('atenciones.deactivate');

	// Imagenes
	Route::get('/admin/imagenes', 'SettingController@imageEdit')->name('imagenes.edit');
	Route::put('/admin/imagenes', 'SettingController@imageUpdate')->name('imagenes.update');

	// Contacto
	Route::get('/admin/contactos', 'SettingController@contactEdit')->name('contactos.edit');
	Route::put('/admin/contactos', 'SettingController@contactUpdate')->name('contactos.update');

	// Politicas
	Route::get('/admin/politicas', 'PoliticController@index')->name('politicas.index');
	Route::get('/admin/politicas/{slug}/editar', 'PoliticController@edit')->name('politicas.edit');
	Route::put('/admin/politicas/{slug}', 'PoliticController@update')->name('politicas.update');	
});

Route::group(['middleware' => ['lang']], function () {
	/////////////////////////////////////////////// WEB ////////////////////////////////////////////////
	Route::get('/{lang?}', 'WebController@index')->name('home');
	Route::get('/{lang}/excursiones', 'WebController@excursions')->name('excursions');
});