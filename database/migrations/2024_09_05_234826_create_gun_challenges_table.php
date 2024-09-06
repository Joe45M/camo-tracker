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
        Schema::create('gun_challenges', function (Blueprint $table) {
            $table->id();
            $table->string('challenge');
            $table->string('camo_name');
            $table->string('came_category');
            $table->bigInteger('gun_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gun_challenges');
    }
};
