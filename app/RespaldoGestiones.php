<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespaldoGestiones extends Model
{
    protected $table = 'respaldo_gestiones';
    protected $fillable = 
    [
        'id','id_recp','amplhechos','fechentrevasesor','tipotramite','asuntotramite','motivoarchivo','fechaarchivo','obsrvtramite','actuarealizadas',
        'actjuridirealzadas','resulactuacion','entidadelantramite','recp_id','fechpriact','n_act','n_aseso','n_autor','asesor',
    ];
}
