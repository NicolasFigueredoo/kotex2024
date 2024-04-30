<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadVenta extends Model
{
    use HasFactory;

    protected $table = 'unidadesventa';

    protected $fillable = [
        'unidad',
    ];

    public function variaciones()
    {
        return $this->belongsToMany(Variacion::class, 'variacion_unidad_venta', 'unidad_id', 'variacion_id')->cascadeDelete();
    }
}

