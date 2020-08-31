<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    protected $table = 'observaciones';
    protected $fillable = 
    [
        'id','obsrv','recp_id',
    ];

    public function recepcion()
    {
        return $this->belongsTo('App\Recepcion','recp_id');
    }
}
