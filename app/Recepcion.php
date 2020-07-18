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

    public function usuario()
    {
        return $this->belongsTo('App\Persona','usu_id');
    }

    public function asignado()
    {
        return $this->belongsTo('App\Persona','asig_id');
    }

    public function recepcionista()
    {
        return $this->belongsTo('App\Persona','recep_id');
    }

    public function reclamante()
    {
        return $this->belongsTo('App\Persona','recla_id');
    }


    public function area()
    {
        return $this->belongsTo('App\Area','area_id');
    }
}
