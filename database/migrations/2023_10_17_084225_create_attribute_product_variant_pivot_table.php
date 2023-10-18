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
        Schema::create('attribute_product_variant', function (Blueprint $table) {
            $table->foreignId('attribute_id')->on('attribute')->onDelete('cascade');
            $table->foreignId('product_variant_id')->on('product_variants')->onDelete('cascade');
            $table->float('wholesale_price', 6, 2, true);
            $table->float('price', 6, 2, true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attribute_product_variant', function (Blueprint $table) {
            $table->dropForeign(['attribute_id', 'product_variant_id']);
        });
        Schema::dropIfExists('attribute_product_variant');
    }
};
