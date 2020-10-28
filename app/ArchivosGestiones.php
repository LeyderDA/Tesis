<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosGestiones extends Model
{
    protected $table = 'archivos_gestiones';
    protected $fillable = 
    [
        'id','archivoGe','ges_id',
    ];
    public function gestiones()
    {
        return $this->belongsTo('App\Gestion','ges_id');
    }
}
