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
        Schema::create('country_product', function (Blueprint $table) {
            $table->foreignId('country_id')->on('countries')->onDelete('cascade');
            $table->foreignId('product_id')->on('products')->onDelete('cascade');
            $table->decimal('wholesale_price')->nullable();
            $table->decimal('price')->nullable();
            $table->primary(['country_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('country_product', function (Blueprint $table) {
            $table->dropForeign(['country_id', 'product_id']);
        });
        Schema::dropIfExists('country_product');
    }
};
