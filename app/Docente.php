<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $fillable = 
    [
        'usu_id','area_id','recp_id',
    ];
}
