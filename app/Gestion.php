<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table = 'gestion_tramites';
    protected $fillable = 
    [
        'id','amplhechos','fechentrevasesor','tipotramite','asuntotramite',
        'estado','motivoarchivo','fechaarchivo','obsrvtramite','actuarealizadas',
        'actjuridirealzadas','resulactuacion','entidadelantramite','recp_id',
    ];

    public function recepcion()
    {
        return $this->belongsTo('App\Recepcion','recp_id');
    }
}
