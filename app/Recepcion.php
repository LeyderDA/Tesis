<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    protected $table = 'recepciones';
    protected $fillable = 
    [
        'id','recepcionado','fecharadicado','fecharecepcionado','consultorio','fechareparto',
        'fechapublicacion','fecharetiro','estado','recla_id','area_id',
    ];

   

    public function reclamante()
    {
        return $this->belongsTo('App\Reclamante','recla_id');
    
    }

    public function area()
    {
        return $this->belongsTo('App\Area','area_id');
    }


    
    public function gestion()
    {
        return $this->belongsTo('App\Gestion','id');
    
    }

    public function intermedia()
    {
        return $this->belongsTo('App\UsuRecep','id');
    
    }

    public function observaciones()
    {
        return $this->belongsTo('App\Observaciones','id');
    
    }

}
