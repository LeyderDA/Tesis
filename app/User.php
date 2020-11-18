<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use app\Persona;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','per_id','rol_id',

    ];
    public function Persona()
    {
        return $this->belongsTo('App\Persona','per_id');
    }

    public function Rol()
    {
        return $this->belongsTo('App\Rol','rol_id');
    }

    public function intermedia()
    {
        return $this->belongsTo('App\UsuRecep','id');
    
    }

    public function recepcion()
    {
        return $this->belongsTo('App\Recepcion','id');
    
    }

    public function foro()
    {
        return $this->belongsTo('App\Foro','id');
    
    }

    public function fotos()
    {
        return $this->belongsTo('App\FotosEstudiantes','id');
    
    }
    public function fotosrol()
    {
        return $this->belongsTo('App\FotosEstudiantes','id');
    

        
    }
    public function mensajes()
    {
        return $this->belongsTo('App\Notificaciones','id');
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rules(){     
        return [
            'username'=>'required|max:10',
            'email'=>'required|email',
            'password'=>'required',
            'per_id'=>'required',
            'rol_id'=>'required',
        ];


    }

    
}
