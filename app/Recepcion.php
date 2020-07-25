<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $table = 'recepciones';
    protected $fillable = 
    [
        'id','recepcionado','fecharadicado','fecharecepcionado','consultorio','fechareparto',
        'fechapublicacion','fecharetiro','usu_id','asig_id','recep_id','recla_id','area_id',
    ];

    public function administrativo()
    {
        return $this->belongsTo('App\Administrativo','recep_id');
    
    }

    public function docente()
    {
        return $this->belongsTo('App\Docente','asig_id');
    
    }

    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante','usu_id');
    
    }

    public function reclamante()
    {
        return $this->belongsTo('App\Reclamante','recla_id');
    
    }

    public function area()
    {
        return $this->belongsTo('App\Area','area_id');
    }

}
