<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    //se tiene que hacer relación a la tabla
    protected $table = 'heroes';

    public function level()
    {
        //Modelo al cual tenemos que relacionar(donde esta la llave foraneo) || clave local de ese modelo || llave foranea del modelo donde estamos
        return $this->hasOne("App\Level", "id", "level_id");
    }
}
