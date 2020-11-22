<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialRecepciones extends Model
{
    protected $table = 'historial_casos';
    protected $fillable = 
    [
        'id','id_recp','recepcionado','fecharadicado','fecharecepcionado','consultorio','fechareparto',
        'fechapublicacion','fecharetiro','estado','notpricort','notsegcort','nottercort','area','usuario','reclamante',
        'instjuri','tramitejuri',
    ];
}
