<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    protected $fillable = 
    [
        'id','notapricort','notasegcort','notateracort','usu_id','recp_id',
    ];

    public function User()
    {
        return $this->belongsTo('App\User','usu_id');
    }

    public function recepcion()
    {
        return $this->belongsTo('App\Recepcion','recp_id');
    }
}
