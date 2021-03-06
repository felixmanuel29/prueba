<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;//conexion con la tabla usuarios
use App\orden;//conexion con la tabla orden
use App\Autos;//conexion con la tabla Autos
class apicontroler extends Controller
{
//Registro de usuarios ||Los usuarios pueden registrarse en la aplicación/prioridad
public function create(Request $request){
$registro_usuario=new usuario();
$registro_usuario->nombre=$request->input('nombre');
$registro_usuario->cedula=$request->input('cedula');
$registro_usuario->correo=$request->input('correo');
$registro_usuario->direccion=$request->input('direccion');
$registro_usuario->contrasena=$request->input('contrasena');
$registro_usuario->save();
return response()->json($registro_usuario);
}
//Actulizacion de perfil usuario
public function actulizar_perfil(Request $request,$id){
$perfil_update=new usuario();
$perfil_update=usuario::find($id);
$perfil_update->nombre=$request->input('nombre');
$perfil_update->cedula=$request->input('cedula');
$perfil_update->correo=$request->input('correo');
$perfil_update->direccion=$request->input('direccion');
$perfil_update->contrasena=$request->input('contrasena');
$perfil_update->save();
return response()->json($perfil_update);
}

//visualizacion de todos los usuarios
public function visualizacion_usuarios(){
$lista_usuarios= new usuario();
$lista_usuarios=usuario::all();
return response()->json($lista_usuarios);
}

// Creacion de Ordenes ||Los usuarios crean ordenes de alquiler de vehículos/prioridad
public function create_orden(Request $request){
    $crear_orden=new orden();
    $crear_orden->codigo_usuario=$request->input('codigo_usuario');
    $crear_orden->model_auto=$request->input('model_auto');
    $crear_orden->tarjeta_cr=$request->input('tarjeta_cr');
    $crear_orden->fech_salida=$request->input('fech_salida');
    $crear_orden->fech_entrada=$request->input('fech_entrada');
    $crear_orden->Estado=$request->input('Estado');
    $crear_orden->save();
    return response()->json($crear_orden);
}

// visualiazacion de historial  ||Pueden crear cuentas de usuario, visualizar su perfil e historial de autos alquilados.
public function historial(){
    $registros_ordenes=new orden();
    $registros_ordenes=orden::all();
    return response()->json($registros_ordenes);
}

//visualizacion de historial de usario por su id de registro/prioridad
public function historial_user($id){
    $user_historial=new orden();
    $user_historial=orden::where('codigo_usuario',$id)->get();
    return response()->json($user_historial);
}

// Actulizacion de solicitud de ordenes si deseaan cancelar 
public function update_historial(Request $request,$id){
   $update_historial= new orden();
   $update_historial=orden::find($id);
   $update_historial->codigo_usuario=$request->input('codigo_usuario');
   $update_historial->model_auto=$request->input('model_auto');
   $update_historial->tarjeta_cr=$request->input('tarjeta_cr');
   $update_historial->fech_salida=$request->input('fech_salida');
   $update_historial->fech_entrada=$request->input('fech_entrada');
   $update_historial->Estado=$request->input('Estado');//Activo/Cancelado.
   $update_historial->save();
   return response()->json( $update_historial);
}

//borrar historial
public function delete_historial(Request $request,$id){
$delete_historial=new orden();
$delete_historial=orden::find($id);
$delete_historial->delete();
return response()->json($delete_historial);
}
//Registro de autos
public function registro_autos(Request $request){
$autos_regist=new Autos();
$autos_regist->modelo_auto=$request->input('modelo_auto');
$autos_regist->placa=$request->input('placa');
$autos_regist->num_seguro=$request->input('num_seguro');
$autos_regist->foto_auto=$request->input('foto_auto');
$autos_regist->Marca=$request->input('Marca');
$autos_regist->Estado=$request->input('Estado');
$autos_regist->save();
return response()->json($autos_regist);
}
//listado de autos/prioridad || Los usuarios deben poder visualizar la lista de los autos disponibles para alquiler.
public function visualizacion_autos(){
    $autos=new Autos();
    $autos=Autos::all();
    return response()->json($autos);
}

}
