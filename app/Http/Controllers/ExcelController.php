<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BD as BD;
use App\bitacora as bitacora;
use Excel as Excel;

class ExcelController extends Controller
{
    public function bitacora()
    {

    	Excel::create('bitacoras', function($excel) {
    		$excel->sheet('incidencias', function($sheet) {
    			$bitacora = bitacora::all();
    			$sheet->fromArray($bitacora);
    		});
    	})->export('xls');
    }

    public function carga_bitacora(Request $request)
    {
    	//dd($request);
      	//$archivo = $request->file('archivo');

      	$archivo = $request->file('archivo');
      	$nombre_original=$archivo->getClientOriginalName();
      	$extension=$archivo->getClientOriginalExtension();
      	$r1=Storage::disk('archivo')->put($nombre_original,  \File::get($archivo) );
      	$ruta = storage_path('files') ."/". $nombre_original;

      	if($r1){
	        $ct=0;
	        Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) {
    	        $hoja->each(function($fila) {
    	            $emple=new Empleados;
					//dd($fila);

	            	$emple->emp_apellidos= $fila->emp_apellidos;
	            	$emple->emp_nombres= $fila->emp_nombres;
	            	$emple->emp_cedula= $fila->emp_cedula;
	            	$emple->car_id= $fila->car_id;
	            	$emple->emp_fecha_ingreso= $fila->emp_fecha_ingreso;
	            	$emple->pro_id= $fila->pro_id;
	            	$emple->emp_correo_electronico= $fila->emp_correo_electronico;
	            	$emple->emp_telefono_habitacion= $fila->emp_telefono_habitacion;
	            	$emple->emp_movil_personal= $fila->emp_movil_personal;
	            	$emple->emp_fecha_nacimiento= $fila->emp_fecha_nacimiento;
	            	$emple->pais_id= $fila->pais_id;
	            	$emple->eciv_id= $fila->eciv_id;
	            	$emple->coo_id= $fila->coo_id;
	            	$emple->cse_id= $fila->cse_id;
	            	$emple->emp_usuario_900= $fila->emp_usuario_900;
	            	$emple->sta_id= $fila->sta_id;
	            	$emple->users_id=Auth::id();

	              	$emple->save();
	           	});

	        });

	        return response()->json(["estatus"=>"ok"]);

      	}
      	else
      	{
        	return view("infosec.cargar")->with("msj","Error al subir el archivo");
      	}
    }
}
