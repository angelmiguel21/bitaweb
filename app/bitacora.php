<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    protected $table = 'bitacoras';

    public function bita_unidad()
    {
     	return $this->hasMany('App\bita_unidad','id_bita','id')->with('unidad');
    }

    public function bita_evento()
    {
     	return $this->hasMany('App\bita_evento', 'id_bita', 'id')->with('evento');
    }

    public function responsables()
    {
    	return $this->hasOne('App\responsable','id','responsable');
    }

    public function impactos()
    {
    	return $this->hasOne('App\impacto','id','impacto');
    }

    public function reportados()
    {
    	return $this->hasOne('App\reportado','id','reportado');
    }

    public function escalamientos()
    {
    	return $this->hasOne('App\escalamiento', 'id', 'escalamiento');
    }

    public function estatu()
    {
    	return $this->hasOne('App\estatu', 'id', 'estatus');
    }

    public function certificacion()
    {
        return $this->hasOne('App\certificacion', 'id_bita', 'id')->with('usuario');
    }

    public function usuario()
    {
        return $this->hasOne('App\user','id','user_id');
    }
}
