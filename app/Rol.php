<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = 
    [
        'id','nombre',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','id');
    
    }
}
