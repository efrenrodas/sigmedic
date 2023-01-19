<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Receta
 *
 * @property $id
 * @property $medicamento
 * @property $dodis
 * @property $duracion
 * @property $instrucciones
 * @property $notas
 * @property $id_cita
 * @property $created_at
 * @property $updated_at
 *
 * @property Cita $cita
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Receta extends Model
{
    
    static $rules = [
		'medicamento' => 'required',
		'dodis' => 'required',
		'id_cita' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['medicamento','dodis','duracion','instrucciones','notas','id_cita'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cita()
    {
        return $this->hasOne('App\Models\Cita', 'id', 'id_cita');
    }
    

}
