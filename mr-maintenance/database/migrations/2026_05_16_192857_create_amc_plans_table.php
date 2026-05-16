<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('amc_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->json('features')->nullable();
            $table->integer('preventive_visits')->default(2);
            $table->integer('emergency_visits')->default(8);
            $table->string('response_time')->default('24-48 hours');
            $table->integer('discount_percent')->default(0);
            $table->boolean('is_popular')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('amc_plans');
    }
};
