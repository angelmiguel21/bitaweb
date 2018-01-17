<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bitacora as B;
use App\bita_evento as BE;

class ChartsController extends Controller
{
    public function __construct()
	{
	    //$this->middleware('auth');
	}

    //
    // Grafico de cantidad de incidencias
    //
    public function incidencias()
	{
	    	$array = array();
	    	$incidencia = BE::select('id_evento', DB::raw('count(id_evento) as eventos'))
	    		->with('evento')				 
				->groupby('id_evento')
				->get();
				//return response()->json($incidencia);				
	    	foreach ($incidencia as $key) {
	    		array_push($array, ['label'=>$key->evento->even_desc, 'value'=>$key->eventos]);
	    	};
	    	return response()->json($array);
	}

	public function fallas()
	{
	    	$array = array();
	    	$falla = BE::select('id_inci', DB::raw('count(id_inci) as incidencias'))
	    		->with('incidencia')				 
				->groupby('id_inci')
				->get();
				//return response()->json($falla);				
	    	foreach ($falla as $key) {
	    		array_push($array, ['label'=>$key->incidencia->inci_desc, 'value'=>$key->incidencias]);
	    	};
	    	return response()->json($array);
	}

	public function estatus()
	{
		$array = array();
		$status = B::select('estatus', DB::raw('count(estatus) as co_est'))
				->with('estatu')
				->groupby('estatus')
				->get();
			//return response()->json($status);		
		foreach ($status as $key ) {
			array_push($array,  ['label'=>$key->estatu->est_desc, 'value'=>$key->co_est]);
		};
		return response()->json($array);
	}
}
