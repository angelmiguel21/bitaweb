<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class certificacion extends Model
{
    protected  $primaryKey = 'id_bita';

    public function usuario()
    {
    	return $this->belongsTo('App\user', 'certificado_por', 'id');
    }
}
