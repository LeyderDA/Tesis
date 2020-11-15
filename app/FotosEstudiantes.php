<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\User;

class FotosEstudiantes extends Model
{
    protected $table = 'fotos_estudiantes';
    protected $fillable = 
    [
        'id','Foto','est_id',
    ];
    public function fotos()
    {
        return $this->belongsTo('App\User','est_id');
    }
}
