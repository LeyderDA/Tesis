<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotosEstudiantes extends Model
{
    protected $table = 'fotos_estudiantes';
    protected $fillable = 
    [
        'id','Foto','est_id',
    ];
    public function fotos()
    {
        return $this->belongsTo('App\FotosEstudiantes','est_id');
    }
}
