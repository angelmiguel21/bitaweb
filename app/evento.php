<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    public function incidencia()
    {
    	return $this->hasOne('App\incidencia','id','id_inci');
    }
}
