<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    /* public function rol()
    {
        return $this->belongsTo(Rol::class);
    }*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nombre_2', 'apellido_1','apellido_2','email', 'nombre_login', 'password', 'direccion', 'telefono_1', 'telefono_2', 'fecha_nacimiento', 'genero', 'tipo_documento',
        'numero_documento', 'id_rol',
    ];

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

    public static function getAdministradores(){
        $administradores = User::where('id_rol', 1)->get();
        return $administradores;
        //dd($administradores);
    }

    public static function getUsers(){
        $users = User::select('users.*','roles.nombre AS nombre_rol')->join('roles', 'roles.id_rol', '=','users.id_rol')->get();
        //dd($users);
        return $users;
    }

}
