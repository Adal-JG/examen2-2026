<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidads';
    protected $primaryKey = 'idUnidad';

    protected $fillable = [
        'nombre'
    ];

    public function materialesUnidad()
    {
        return $this->hasMany(MaterialUnidad::class, 'unidad_id', 'idUnidad');
    }

    public function presupuestos()
    {
        return $this->hasMany(Presupuesto::class, 'unidad_id', 'idUnidad');
    }
}