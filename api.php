<?php

use Illuminate\Http\Request;
use App\usuario;
use App\orden;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
//ruta para el registro de usuario   1
Route::post('/registro','apicontroler@create');
//ruta para la actulizacion del perfil de usuario   2
Route::put('/perfil_update/{id}', 'apicontroler@actulizar_perfil');
//ruta para visualzar a todos los usuarios  3
Route::get('/usuarios', 'apicontroler@visualizacion_usuarios');
//ruta para la creacion de ordenes  4
Route::post('/orden_creacion','apicontroler@create_orden');
//ruta del los registros del historial   5
Route::get('/historial','apicontroler@historial');
//ruta de registro del historial por el id de usuario   6
Route::get('/historial/{id}','apicontroler@historial_user');
//ruta para la actulizacion de ordenes para cancelar    7
Route::put('/historial_update/{id}', 'apicontroler@update_historial');
//ruta para borrar el historial de la orden       8
Route::delete('historial_delete/{id}','apicontroler@delete_historial');
//ruta para registrar autos      9
Route::post('auto_registro','apicontroler@registro_autos');
//ruta para visualizar lista de autos disponibles   10
Route::get('autos_disponibles','apicontroler@visualizacion_autos');




