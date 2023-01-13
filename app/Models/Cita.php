<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cita
 *
 * @property $id
 * @property $horario
 * @property $id_paciente
 * @property $id_medico
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cita extends Model
{
    
    static $rules = [
		'horario' => 'required',
		// 'id_paciente' => 'required',
		'id_medico' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 25;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['horario','id_paciente','id_medico','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_paciente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medico()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_medico');
    }
    

}
