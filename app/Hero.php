<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    //se tiene que hacer relación a la tabla
    protected $table = 'heroes';
}
