<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    protected $fillable = 
    [
        'id','notapricort','notasegcort','notateracort','notafinprom','usu_id',
    ];

    public function User()
    {
        return $this->belongsTo('App\User','usu_id');
    }
}
