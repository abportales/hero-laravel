<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //Relación a la tabla
    protected $table = 'levels';

    public function heroes()
    {
        return $this->hasMany('App\heroes');
    }
}
