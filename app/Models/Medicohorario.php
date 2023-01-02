<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicohorario
 *
 * @property $id
 * @property $hora
 * @property $id_medico
 * @property $estado
 * @property $observacion
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medicohorario extends Model
{
    
    static $rules = [
		'hora' => 'required',
		'id_medico' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['hora','id_medico','estado','observacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_medico');
    }
    

}
