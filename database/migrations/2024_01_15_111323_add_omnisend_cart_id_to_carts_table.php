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
        Schema::table('carts', function (Blueprint $table) {
            $table->string('omnisend_cart_id')->after('stripe_payment_intent_id');
        });
        Schema::table('cart_items', function (Blueprint $table) {
            $table->string('omnisend_cart_product_id')->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('omnisend_cart_id');
        });
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropColumn('omnisend_cart_product_id');
        });
    }
};
