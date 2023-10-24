<?php

use App\Models\Address;
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('country_id')->nullable()->constrained();
            $table->enum('type', Address::TYPES);
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('postcode');
            $table->string('city');
            $table->string('state');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('sdi')->nullable();
            $table->string('pec')->nullable();
            $table->boolean('default')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
