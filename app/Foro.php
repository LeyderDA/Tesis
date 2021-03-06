<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    protected $table = 'foro';
    protected $fillable = [
        'id', 'titulo','descripcion','fechapublicación','estadoFo','doc_id','area_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','doc_id');
    
    }

    public function comentario()
    {
        return $this->belongsTo('App\Comentario','id');
    
    }

    public function area()
    {
        return $this->belongsTo('App\Area','area_id');
    
    }
    public function archivos()
    {
        return $this->belongsTo('App\ArchivosForos','id');
    
    }
}
