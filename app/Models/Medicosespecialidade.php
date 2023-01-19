<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicosespecialidade
 *
 * @property $id
 * @property $id_medido
 * @property $id_especialidad
 * @property $estado
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @property Especialidade $especialidade
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medicosespecialidade extends Model
{

    static $rules = [
		'id_medido' => 'required',
		'id_especialidad' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_medido','id_especialidad','estado','precio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function especialidad()
    {
        return $this->hasOne('App\Models\Especialidade', 'id', 'id_especialidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_medido');
    }



}
