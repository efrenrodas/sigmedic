<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Examene
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $id_cita
 * @property $created_at
 * @property $updated_at
 *
 * @property Cita $cita
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Examene extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'id_cita' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','id_cita'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cita()
    {
        return $this->hasOne('App\Models\Cita', 'id', 'id_cita');
    }
    

}
