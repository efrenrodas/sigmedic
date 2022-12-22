<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 *
 * @property $id
 * @property $tipo_registro
 * @property $edad
 * @property $seguroMedico
 * @property $nombreContactoEm
 * @property $numContactoEm
 * @property $id_user
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paciente extends Model
{
    
    static $rules = [
		'tipo_registro' => 'required',
		'edad' => 'required',
		'seguroMedico' => 'required',
		'id_user' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_registro','edad','seguroMedico','nombreContactoEm','numContactoEm','id_user'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
