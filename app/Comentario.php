<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentario';
    protected $fillable = [
        'id', 'coment','usua_id','for_id',
    ];
    public function foro()
    {
        return $this->belongsTo('App\Foro','for_id');
    
    }
  
}
