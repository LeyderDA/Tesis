<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $fillable = 
    [
        'id','per_id',
    ];

    public function Persona()
    {
        return $this->belongsTo('App\Persona','per_id');
    }

    public function recepcion()
    {
        return $this->belongsTo('App\Recepcion','id');
    
    }
    
}

