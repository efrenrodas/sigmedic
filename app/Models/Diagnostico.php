<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Diagnostico
 *
 * @property $id
 * @property $tipo
 * @property $diagnostico
 * @property $id_cita
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Cita $cita
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Diagnostico extends Model
{
    
    static $rules = [
		'tipo' => 'required',
		'diagnostico' => 'required',
		'id_cita' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo','diagnostico','id_cita','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cita()
    {
        return $this->hasOne('App\Models\Cita', 'id', 'id_cita');
    }
    

}
