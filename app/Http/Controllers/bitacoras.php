<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bitacora as B;
use App\bita_evento as bita_evento;
use App\bita_unidad as bita_unidad;
use App\incidencia as incidencia;
use App\certificacion as certificacion;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB as DB;
use Carbon\Carbon;

class bitacoras extends Controller
{
     public function __construct()
        {
             //$this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bitacora.consultar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bitacora.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //validar
       $rules = array(
            'usuario'       =>'required',
            'proveedor'     =>'required',
            'detectado'     =>'required',
            'telrepor'      =>'required',
            'responsable'   =>'required',
            'nivel'         =>'required',
            'reportado'     =>'required',
            'esca_nivel'    =>'required',
            'estatus'       =>'required',        
            'origen'        =>'',
            'sintoma'       =>'required',
            'observacion'   =>'required',
            'selecevento'   =>'required',
            'numeroticket'  =>''
            );

        //guardar en la bd
            $bit = new B;
                
                    $bit->escalamiento  = $request->input('esca_nivel');
                    $bit->detectado     = $request->input('detectado');
                    $bit->reportado     = $request->input('reportado');
                    $bit->telrepor      = $request->input('telefono');
                    $bit->responsable   = $request->input('responsable');
                    $bit->ticket        = $request->input('numeroticket');
                    $bit->origen        = $request->input('origeninc');
                    $bit->sintoma       = $request->input('sintoma');
                    $bit->user_id       = $request->input('usuario_id');
                    $bit->impacto       = $request->input('nivel');
                    $bit->observacion   = $request->input('observacion');
                    $bit->estatus       = $request->input('estatus');
                    $bit->save();

                $id = $bit->id;

                $eventos = $request->input('selecevento'); 
                    foreach ($eventos as $evento) {
                       $uno = json_decode($evento);
                       foreach ($uno as $u) {
                        $inicio = carbon::parse($u->fechadetect);
                        $inicio = $inicio->format('Y-m-d H:i');
                        $repor = carbon::parse($u->fecharepor);
                        $repor = $repor->format('Y-m-d H:i');
                        $tick = carbon::parse($u->fechainicio);
                        $tick = $tick->format('Y-m-d H:i');
                        $culm = carbon::parse($u->fechaculmina);
                        $culm = $culm->format('Y-m-d H:i');
                           $e = new bita_evento;
                            $e->id_bita         = $id;
                            $e->id_inci         = $u->inci_id;
                            $e->id_evento       = $u->even_id;
                            $e->fec_detect      = $inicio;
                            $e->fec_repor       = $repor;
                            $e->fec_initicket   = $tick;
                            $e->fec_culmina     = $culm;
                            $e->save();
                       } // cierra el foreach $uno
                    } // cierra el  foreach $eventos

                $proveedor = $request->input('proveedor');
                
                foreach ($proveedor as $unidades) {
                    $unidad = new bita_unidad;
                        $unidad->id_bita    =   $id;
                        $unidad->id_unidad  =   $unidades;
                        $unidad->save();
                }

                $certi = new certificacion;
                    $certi->id_bita          =$id;
                    $certi->certificado      ="No";
                    $certi->save();

            return redirect('bitacora')->with('status', 'ok' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bit = B::where('id',$id)
                ->with('certificacion','responsables','impactos','reportados','escalamientos','estatu','bita_unidad','bita_evento','usuario')
                ->get();
        //return response()->json($bit);
            /*foreach ($bit as $key) {
                return response()->json($key->certificacion);
            }*/

           // return response()->json($bit);
        return view('bitacora.editar')->with('bitacora', $bit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dd($request);
                //validar
        $rules = array(
            'proveedor'     =>'required',
            'escalado'      =>'required',
            'detectado'     =>'required',
            'reportado'     =>'required',
            'telrepor'      =>'required',
            'responsable'   =>'required',
            'ticket'        =>'',
            'origen'        =>'',
            'sintoma'       =>'required',
            'usuario'       =>'required',
            'nivel'         =>'required',
            'observacion'   =>'required',
            'estatus'       =>'required',
            'certificado'   =>'',
            'certificadopor'=>'',
            'ticketraiz'    =>''
            );

        //guardar en la bd
            $bit = B::find($id);
                $proveedor = $request->input('proveedor');
                    $prove =json_encode($proveedor, JSON_UNESCAPED_UNICODE);

                $bit->escalamiento  = $request->input('esca_nivel');
                $bit->detectado     = $request->input('detectado');
                $bit->reportado     = $request->input('reportado');
                $bit->telrepor      = $request->input('telefono');
                $bit->responsable   = $request->input('responsable');
                $bit->ticket        = $request->input('ticket');
                $bit->origen        = $request->input('origeninc');
                $bit->sintoma       = $request->input('sintoma');
                $bit->impacto       = $request->input('nivel');
                $bit->observacion   = $request->input('observacion');
                $bit->estatus       = $request->input('estatus');
                $bit->ticketraiz    = $request->input('ticketraiz');
                $bit->save();
                
                $id = $bit->id;

                $certifica = $request->input('certificado');

                if ($certifica = "si") {

                    $certi = certificacion::find($id);
                        $certi->certificado     =$request->input('certificado');
                        $certi->certificado_por  =$request->input('certificadopor');
                        $certi->save();
                }

                $proveedor = $request->input('proveedor');
                $unidad = array();
                $queryprovee = DB::table('bita_unidad')->where('id_bita', '=', $id)->get();
                    foreach ($queryprovee as $key) {
                        array_push($unidad, $key->id_unidad);
                    }

                $newprove =array_diff($proveedor, $unidad);

                foreach ($newprove as $newproves) {
                    $unidad = new bita_unidad;
                        $unidad->id_bita    =   $id;
                        $unidad->id_unidad  =   $newproves;
                        $unidad->save();
                }

            return redirect('bitacora')->with('status', 'Actualizado' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
