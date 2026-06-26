<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $primaryKey = 'codigoPresupuesto';

    protected $fillable = [
        'nombrePresupuesto',
        'unidad_id'
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id', 'idUnidad');
    }

    public function materialesUnidad()
    {
        return $this->hasMany(MaterialUnidad::class, 'presupuesto_id', 'codigoPresupuesto');
    }
}