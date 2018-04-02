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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

//navegacion
Route::resource('/usuario', 'Usuarios');
Route::resource('/bitacora', 'bitacoras');
Route::resource('/diario', 'diarios');
Route::resource('/cor', 'CorController');
Route::resource('/claves/asignar', 'asignarclaves');
Route::resource('/claves/inconveniente', 'inconveclaves');
Route::get('/reporte/claves', 'Reportes@clave');

//Ajax
Route::post('/ajax/evento/{id}','ajaxController@actualizaEvento');
Route::post('/ajax/añadir/evento/{id}','ajaxController@añadirEvento');

//Reportes
Route::get('/reporte/bitacora', 'Reportes@bitacora');
Route::get('/reporte/gestiondiaria', 'Reportes@diario');

// Listas dependientes
Route::get('/unidades', 'Dependientes@unidades');
Route::get('/incidencia', 'Dependientes@incidencia');
Route::get('/evento/{id}', 'Dependientes@evento');
Route::get('/seleccion/{id}', 'Dependientes@seleccion');
Route::get('/responsables', 'Dependientes@responsables');
Route::get('/reportados', 'Dependientes@reportados');
Route::get('/bita_estatus', 'Dependientes@bita_estatus');
Route::get('/impactos', 'Dependientes@impactos');
Route::get('/escalamientos', 'Dependientes@escalamientos');
Route::get('/proveedores', 'Dependientes@proveedores');


//datatable
Route::get('/tabla/usuario', 'DatatableController@Usuarios');
Route::get('/tabla/bitacora', 'DatatableController@Bitacora');

//graficos
Route::get('/incidencias', 'ChartsController@incidencias');
Route::get('/fallas', 'ChartsController@fallas');
Route::get('/estatus', 'ChartsController@estatus');

//validacion
Route::get('/ticket/{ticket}','validationController@ticket');

// data a excel - excel a data
Route::post('carga/bitacora','ExcelController@carga_bitacora');
Route::get('/excel/bitacora', 'ExcelController@bitacora');


Route::get('/test', 'testController@test');
