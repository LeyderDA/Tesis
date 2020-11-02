<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosForos extends Model
{
    protected $table = 'archivos_foro';
    protected $fillable = 
    [
        'id','archivoFo','foro_id',
    ];
    public function foros()
    {
        return $this->belongsTo('App\Foro','foro_id');
    }
}
