<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespaldoRecepciones extends Model
{
    protected $table = 'respaldo_recepciones';
    protected $fillable = 
    [
        'id','id_recp','recepcionado','fecharadicado','fecharecepcionado','consultorio','fechareparto',
        'fechapublicacion','fecharetiro','estado','notpricort','notsegcort','nottercort','area','usuario','reclamante',
    ];
}
