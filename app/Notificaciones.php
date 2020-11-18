<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    protected $table = 'notificaciones';
    protected $fillable = 
    [
        'id','mensaje','id_usuario'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','id_usuario');
    }

}
