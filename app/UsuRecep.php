<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuRecep extends Model
{
    protected $table = 'usurecep';
    protected $fillable = 
    [
        'id','recp_id','usu_id',
    ];

    public function recepcion()
    {
        return $this->belongsTo('App\Recepcion','recp_id');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User','usu_id');
    }
}
