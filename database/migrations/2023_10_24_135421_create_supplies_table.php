<?php

use App\Models\Supply;
use App\Models\User;
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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->text('uuid');
            $table->foreignIdFor(User::class)->constrained();
            $table->decimal('amount');
            $table->string('payment_method')->nullable();
            $table->enum('status', array_keys(Supply::STATUSES));
            $table->boolean('confirmed')->default(false);
            $table->timestamp('shipped_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
