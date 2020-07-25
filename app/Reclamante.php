<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamante extends Model
{
    protected $table = 'reclamantes';
    protected $fillable = 
    [
        'id','enfodifervictima','genevictima','edadvictima','discapavictima',
        'estravictima','embaravictima','grupetnicovictima','persoentidreclama',
        'per_id',
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
