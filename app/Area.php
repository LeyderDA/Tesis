<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = [
        'id', 'nombre',
    ];

    public function recepcion()
    {
        return $this->belongsTo('App\Recepcion','id');
    
    }

    public function foro()
    {
        return $this->belongsTo('App\Foro','id');
    
    }
}
