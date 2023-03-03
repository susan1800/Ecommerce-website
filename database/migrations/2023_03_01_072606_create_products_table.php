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
            $table->string('title');
            $table->integer('price')->nullable();
            $table->integer('min_quantity');
            $table->integer('discount_price')->nullable();
            $table->string('disount_start_date')->nullable();
            $table->string('disount_end_date')->nullable();
            $table->string('image');
            $table->string('photos');
            $table->longText('details');
            $table->unsignedBigInteger('category_id');
            $table->string('video')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->string('tags');
            $table->boolean('publish')->default('1');
            $table->boolean('featured')->default('0');
            $table->integer('rating')->default('0');
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
