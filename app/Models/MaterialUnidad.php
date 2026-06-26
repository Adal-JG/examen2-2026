<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    protected $table = 'material_unidads';
    protected $primaryKey = 'idMaterialUnidad';

    protected $fillable = [
        'cantidad',
        'material_id',
        'unidad_id',
        'presupuesto_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'codigo');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id', 'idUnidad');
    }

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'presupuesto_id', 'codigoPresupuesto');
    }
}