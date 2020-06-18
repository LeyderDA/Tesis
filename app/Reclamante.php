<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamante extends Model
{
    protected $table = 'reclamantes';
    protected $fillable = 
    [
        'id','enfodifervictima','genevictima','edadvictima','discapavictima',
        'estravictima','embaravictima','grupetnicovictima','persoentidreclama',
        'recp_id',
    ];
}
