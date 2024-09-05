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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name");
            $table->string("product_stock");
            $table->string("product_price");
            $table->string("product_url_image")->nullable();
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
        Schema::dropIfExists('products');
    }
};