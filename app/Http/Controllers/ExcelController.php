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
}
