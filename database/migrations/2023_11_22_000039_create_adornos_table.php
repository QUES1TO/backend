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
        Schema::create('adornos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->unsignedBigInteger('categoria_id');
            $table->integer("stock");
            $table->integer("precio");
 
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adornos');
    }
};
