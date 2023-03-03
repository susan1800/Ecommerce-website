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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->String('user_name')->nullable();
            $table->String('email')->nullable();
            $table->String('mobile')->nullable();
            $table->String('design')->nullable();
            $table->String('payment_remarks')->nullable();
            $table->String('payment_image')->nullable();
            $table->boolean('seen')->default('1');
            $table->boolean('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
