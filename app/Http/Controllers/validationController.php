<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use gescnp\Http\Controllers\Controller;
use DB as DB;
use gescnp\bitacora as bitacora;

class validationController extends Controller
{
    public function ticket($request)
    {

    	$existe = DB::table('bitacoras')->where('ticket', $request)->select('id')->get();

    	return response()->json($existe);



    }
}
