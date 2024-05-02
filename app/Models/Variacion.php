<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variacion extends Model
{
    use HasFactory;
    protected $table = 'variaciones';

    protected $fillable = ['orden','producto_id', 'color', 'medida','material','tipo', 'imagen', 'imagen2'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'variacion_categoria', 'variacion_id', 'categoria_id');
    }

    public function aplicaciones()
    {
        return $this->belongsToMany(Aplicacion::class, 'variacion_aplicacion');
    }

    public function unidadesVenta()
    {
        return $this->belongsToMany(UnidadVenta::class, 'variacion_unidad_venta', 'variacion_id', 'unidad_id');
    }
}
