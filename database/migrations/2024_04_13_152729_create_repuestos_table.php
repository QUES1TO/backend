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
        Schema::create('repuestos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("cc");
            $table->string("modelo");
            $table->string("marca");
            $table->string("url_imagen");
            $table->string("stock");
            $table->string("descripcion");
            $table->string("precio");

           

            $table->unsignedBigInteger('categoria_id');

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repuestos');
    }
};
