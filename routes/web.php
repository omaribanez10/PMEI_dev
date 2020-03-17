<?php

Route::get('/', 'HomeController@index')->name('home');

/** ROUTES EQUIPOS **/
Route::get('equipos', 'EquiposController@index')->name('equipos.index')->middleware('auth');
Route::post('equipos/create', 'EquiposController@create')->name('equipos.create')->middleware('auth','roles:1');
Route::get('equipos/show/{id}', 'EquiposController@show')->name('equipos.show')->middleware('auth','roles:1');
Route::post('equipos/store', 'EquiposController@store')->name('equipos.store')->middleware('auth','roles:1');
Route::get('equipos/edit/{id}', 'EquiposController@edit')->name('equipos.edit')->middleware('auth','roles:1');
Route::patch('equipos/baja/{equipo}', 'EquiposController@destroy')->name('equipos.destroy')->middleware('auth','roles:1');
Route::post('equipos/update/{equipo}', 'EquiposController@update')->name('equipos.update')->middleware('auth','roles:1');

Route::post('equipos/cargar_datos', 'EquiposController@cargarDatosSelect')->name('equipos.cargar_datos');

/** ROUTES PARA EL GENERADOR DE BARRA DE CÓDIGOS**/

Route::get('codigos_barra', 'CodigoBarraController@index')->name('codigos_barra.index')->middleware('auth','roles:1');
Route::get('codigos_barra/create', 'CodigoBarraController@create')->name('codigos_barra.create')->middleware('auth','roles:1');


/** ROUTES MANTENIMIENTOS **/
Route::get('mantenimientos', 'MantenimientosController@index')->name('mantenimientos.index')->middleware('auth');
Route::post('mantenimientos/cargarPDF_store', 'MantenimientosController@cargarPDF_store')->name('mantenimientos.cargarPDF_store')->middleware('auth','roles:1');
Route::get('mantenimientos/ver_pdf_mantenimiento/{id_mantenimiento}', 'MantenimientosController@ver_pdf_mantenimiento')->name('mantenimientos.ver_pdf_mantenimiento')->middleware('auth','roles:1');
Route::get('mantenimientos/descargar_excel_mantenimiento/{id_mantenimiento}', 'MantenimientosController@descargar_excel_mantenimiento')->name('mantenimientos.descargar_excel_mantenimiento')->middleware('auth','roles:1');
Route::get('mantenimientos/{equipo}/cargarpdf', 'MantenimientosController@cargarpdf')->name('mantenimientos.cargarpdf')->middleware('auth','roles:1');
Route::get('mantenimientos/{equipo}/create', 'MantenimientosController@create')->name('mantenimientos.create')->middleware('auth');
Route::get('mantenimientos/{id}/edit', 'MantenimientosController@edit')->name('mantenimientos.edit')->middleware('auth');
Route::get('mantenimientos/{id}', 'MantenimientosController@show')->name('mantenimientos.show')->middleware('auth');
Route::post('mantenimientos/store', 'MantenimientosController@store')->name('mantenimientos.store')->middleware('auth');
Route::patch('mantenimientos/{mantenimiento}', 'MantenimientosController@update')->name('mantenimientos.update')->middleware('auth');
Route::delete('mantenimientos/{mantenimiento}', 'MantenimientosController@destroy')->name('mantenimientos.destroy')->middleware('auth','roles:1');


/** ROUTE CALIBRACIONES **/
Route::post('calibraciones', 'CalibracionController@store')->name('calibraciones.store')->middleware('auth');
Route::get('calibraciones/{equipo}/create', 'CalibracionController@create')->name('calibraciones.create')->middleware('auth');


/** MANTENIMIENTO PENDIENTES **/
Route::get('mantenimientos_pendientes/{mantenimiento_pendiente}', 'MantenimientosController@show_pendientes')->name('mantenimientos.mantenimientos_pendientes.show')->middleware('auth');
Route::patch('mantenimientos_pendientes/accept/{mantenimientos_pendientes_det}', 'MantenimientosController@accept')->name('mantenimientos_pendientes.accept')->middleware('auth','roles:1');
Route::patch('mantenimientos_pendientes/refuse/{mantenimientos_pendientes_det}', 'MantenimientosController@refuse')->name('mantenimientos_pendientes.refuse')->middleware('auth','roles:1');


/**---------------------------------------------------------------------------------------------------------------**/

/**  ROUTES TECNICOS **/
Route::get('tecnicos', 'TecnicosController@index')->name('tecnicos.index')->middleware('auth');
Route::get('tecnicos/create', 'TecnicosController@create')->name('tecnicos.create')->middleware('auth');
Route::get('tecnicos/{id}', 'TecnicosController@show')->name('tecnicos.show')->middleware('auth');
Route::post('tecnicos/store', 'TecnicosController@store')->name('tecnicos.store')->middleware('auth');
Route::get('tecnicos/{id}/edit', 'TecnicosController@edit')->name('tecnicos.edit')->middleware('auth');
Route::patch('tecnicos/{tecnico}', 'TecnicosController@update')->name('tecnicos.update')->middleware('auth');
Route::delete('tecnicos/{tecnico}', 'TecnicosController@destroy')->name('tecnicos.destroy')->middleware('auth');
/**-------------------------------------------------------------------------------------------**/

/** ROUTES USUARIOS **/
Route::get('usuarios/showRegistrationForm', 'Auth\RegisterController@showRegistrationForm')->name('usuarios.showRegistrationForm')->middleware('auth');
Route::get('usuarios', 'UsersController@index')->name('usuarios.index')->middleware('auth');
Auth::routes(['register' => true]);

/** ROUTES DE REPORTES **/
Route::get('reportes', 'ReportesController@index')->name('reportes.index')->middleware('auth');

