<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB as DB;

class Dependientes extends Controller
{
    public function __construct()
        {
            // $this->middleware('auth');
        }

    public function incidencia()
    {
    	$incidencia = DB::table('incidencias')->get();
       		return response()->json($incidencia);
    }


    public function evento($request)
    {
    	$evento = DB::table('eventos')->where('id_inci', $request)->get();
       		return response()->json($evento);
    }

    public function unidades()
    {
        $unidades = DB::table('unidad')->get();
            return response()->json($unidades);
    }

    public function seleccion($request)
    {
        $seleccion = DB::table('bita_unidad')->where('id_bita', $request)->get();
            return response()->json($seleccion);
    }

    public function responsables()
    {
        $responsable = DB::table('responsables')->get();
            return response()->json($responsable);
    }

    public function reportados()
    {
        $reportados = DB::table('reportados')->get();
            return response()->json($reportados);
    }

    public function bita_estatus()
    {
        $estatus = DB::table('estatus')->get();
            return response()->json($estatus);
    }

    public function impactos()
    {
        $impactos = DB::table('impactos')->get();
            return response()->json($impactos);
    }

    public function escalamientos()
    {
        $escalamientos = DB::table('escalamientos')->get();
            return response()->json($escalamientos);
    }

    public function proveedores()
    {
        $proveedores = DB::table('proveedores')->get();
            return response()->json($proveedores);
    }
}
