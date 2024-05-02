<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('variaciones', function (Blueprint $table) {
            $table->id();
            $table->string('orden');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->string('color');
            $table->string('medida');
            $table->string('material');
            $table->string('tipo');
            $table->string('imagen')->nullable();
            $table->string('imagen2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variaciones');
    }
};
