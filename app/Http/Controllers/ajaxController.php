<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bita_evento as BE;
use DB as DB;
use carbon as carbon;

class ajaxController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
	}
    
    /*
    *
    * Funcion para actualizar las fechas de los eventos.
    *
    */

    public function actualizaEvento(request $request, $id)
    {
        //return response()->json($request);
        //dd($id);
    	$actualiza = DB::table('bita_eventos')
    					->where('id_evento','=',$id)
    					->update(['fec_detect' => $request->fechaini,
    							  'fec_repor' => $request->fecrepor,
    							  'fec_initicket' => $request->fecticket,
    							  'fec_culmina' => $request->feculmina,
    							  'updated_at'	=> date("Y-m-d H:i:s")
    							]);
    	if ($actualiza) {
    		
    	}// cierre del if
    }

    public function añadirEvento(request $request, $id)
    {

        $evento = new BE;
            $evento->id_bita        = $id;
            $evento->id_inci        = $request->incidencia;
            $evento->id_evento      = $request->evento;
            $evento->fec_detect     = $request->detecta;
            $evento->fec_repor      = $request->reporta;
            $evento->fec_initicket  = $request->initicket;
            $evento->fec_culmina    = $request->culmina;
            $evento->save();
            
        $id_nuevo_evento = BE::all()->last()->id; 

            //dd($id_nuevo_evento);
            return response()->json($id_nuevo_evento);  
    }
}
