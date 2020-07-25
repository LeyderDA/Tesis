<?php

namespace App;
use app\User;
use app\Docente;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = 
    [
        'id','cedula','prinom','segnom','priape','segape','tel','direc',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','id');
    
    }

    public function reclamante()
    {
        return $this->belongsTo('App\Reclamante','id');
    
    }
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante','id');
    
    }
    public function docente()
    {
        return $this->belongsTo('App\Docente','id');
    
    }
    public function administrativo()
    {
        return $this->belongsTo('App\Administrativo','id');
    
    }
}
