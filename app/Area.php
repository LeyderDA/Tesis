<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected $fillable = [
        'id', 'nombrearea',
    ];
}
