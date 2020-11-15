<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\User;

class FotosRoles extends Model
{
    protected $table = 'fotos_roles';
    protected $fillable = 
    [
        'id','Fotorol','usu_rol_id',
    ];
    public function fotos()
    {
        return $this->belongsTo('App\User','usu_rol_id');
    }
}
