<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    protected $table = 'administrativos';
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
