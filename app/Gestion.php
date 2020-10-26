<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table = 'gestion_tramites';
    protected $fillable = 
    [
        'id','amplhechos','fechentrevasesor','tipotramite','asuntotramite','motivoarchivo','fechaarchivo','obsrvtramite','actuarealizadas',
        'actjuridirealzadas','resulactuacion','entidadelantramite','recp_id','fechpriact','n_act','n_aseso','n_autor','asesor',
    ];

    public function recepcion()
    {
        return $this->belongsTo('App\Recepcion','recp_id');
    }
}
