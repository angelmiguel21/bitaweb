<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bita_evento extends Model
{
    protected $table = 'bita_eventos';
    protected  $primaryKey = 'id_bita';
    protected $fillable = ['fec_detect','fec_repor','fec_initicket','fec_culmina','updated_at'];

    public function bitacora()
    {
		return $this->belongsTo('bitacora', 'id_bita');
    }

    public function evento()
    {
    	return $this->belongsTo('App\evento', 'id_evento', 'id')->with('incidencia');
    }

    public function incidencia()
    {
        return $this->belongsTo('App\incidencia','id_inci','id');
    }
}
