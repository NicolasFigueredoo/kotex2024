<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function variaciones()
    {
        return $this->belongsToMany(Variacion::class, 'variacion_categoria', 'categoria_id', 'variacion_id')->cascadeDelete();
    }
}
