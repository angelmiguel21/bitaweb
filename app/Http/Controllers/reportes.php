<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportes extends Controller
{
    public function __construct()
        {
             $this->middleware('auth');
        }
        public function bitacora()
    {
        //
        return view('bitacora.reporte');
    }

        public function diario()
    {
        //
        return view('gestion.reporte');
    }

            public function clave()
    {
        //
        return view('claves.reporte');
    }
}
