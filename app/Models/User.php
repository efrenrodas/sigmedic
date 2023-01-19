<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellidos',
        'identificacion',
        'fechaNaciemiento',
        'id_genero',
        'ciudadResidencia',
        'email',
        'imagen',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function genero()
    {
        return $this->hasOne('App\Models\Genero', 'id', 'id_genero');
    }

    public function medicoespecialidades()
    {
        #return $this->hasMany('App\Models\RoleHasPermission', 'role_id', 'id');
        return $this->hasMany('App\Models\Medicosespecialidade','id_medido','id');
    }
}
