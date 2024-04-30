<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variacion extends Model
{
    use HasFactory;
    protected $table = 'variaciones';

    protected $fillable = ['producto_id', 'color', 'medida', 'imagen', 'imagen2', 'imagen3'];

    public function producto()
    {
        return $this->belongsTo(Producto::class)->cascadeDelete();
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'variacion_categoria', 'variacion_id', 'categoria_id')->cascadeDelete();
    }

    public function aplicaciones()
    {
        return $this->belongsToMany(Aplicacion::class, 'variacion_aplicacion')->cascadeDelete();
    }

    public function unidadesVenta()
    {
        return $this->belongsToMany(UnidadVenta::class, 'variacion_unidad_venta', 'variacion_id', 'unidad_id')->cascadeDelete();
    }
}
