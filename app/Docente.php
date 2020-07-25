<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
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
