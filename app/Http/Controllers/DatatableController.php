<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use App\User as U;
use App\bitacora as B;

class DatatableController extends Controller
{
    public function __construct()
        {
             //$this->middleware('auth');
        }
    public function Usuarios()
    {
    	$usuarios = U::all();
    		return Datatables::of($usuarios)
    		->make(true);
    }

    public function Bitacora()
    {
      $bit = B::with('bita_unidad','bita_evento','responsables','impactos','reportados','escalamientos','estatu')->get();          
    		return Datatables::of($bit)
            ->addColumn('action', function($bit) {
                return '<div align="center"><a class="btn btn-flat btn-primary" href="bitacora/'.$bit->id.'/edit" value="'.$bit->id.'">Ver</a></div>'
            ;})
    		->make(true);
    }
}
