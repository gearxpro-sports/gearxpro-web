<?php

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(ProductVariant::class);
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('minimal_quantity')->default(0);
            $table->unsignedInteger('low_stock_threshold')->default(0);
            $table->boolean('low_stock_alert')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
