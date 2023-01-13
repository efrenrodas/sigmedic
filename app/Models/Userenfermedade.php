<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Userenfermedade
 *
 * @property $id
 * @property $nombre
 * @property $medicamento
 * @property $id_paciente
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Userenfermedade extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'id_paciente' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','medicamento','id_paciente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_paciente');
    }
    

}
