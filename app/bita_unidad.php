<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bita_unidad extends Model
{
    protected $table = 'bita_unidad';

    public function bitacora()
    {
		return $this->belongsTo('bitacora', 'id_bita');
    }

    public function unidad()
    {
    	return $this->belongsTo('App\unidad', 'id_unidad', 'id');
    }
}
