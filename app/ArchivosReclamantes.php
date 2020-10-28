<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosReclamantes extends Model
{
    protected $table = 'archivos_reclamantes';
    protected $fillable = 
    [
        'id','archivoRe','c',
    ];
    public function gestiones()
    {
        return $this->belongsTo('App\Reclamante','recla_id');
    }
    
}
