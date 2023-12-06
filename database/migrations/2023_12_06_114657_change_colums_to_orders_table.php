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
        Schema::table('orders', function (Blueprint $table) {
            $table->renameColumn('stripe_id', 'stripe_payment_intent_id');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('stripe_payment_intent_id')->unique()->change();
            $table->string('reference')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropUnique(['stripe_payment_intent_id']);
            $table->dropUnique(['reference']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->renameColumn('stripe_payment_intent_id', 'stripe_id');
        });
    }
};
