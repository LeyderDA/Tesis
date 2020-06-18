<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    protected $fillable = 
    [
        'id','notapricort','notasegcort','notateracort','notafinprom','recp_id',
    ];
}
