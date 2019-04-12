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

/*Route::get('pdf','PdfController@getIndex');
Route::get('pdf/generar','PdfController@getGenerar');*/
Route::get('/',function(){
	return redirect('/servicio');
});

Route::resource('/reclamos', 'reclamosController');
Route::resource('/turbos', 'TurboController');
Route::resource('/servicio', 'servicioController');
Route::resource('/observaciones', 'observacionesController');





Route::get('/editmarca/{id}', 'TurboController@editmarca');
