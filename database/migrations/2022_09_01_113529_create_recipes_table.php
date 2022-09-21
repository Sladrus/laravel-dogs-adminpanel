<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('grams')->default('0');
            $table->string('kcal')->default('0');
            $table->string('fats')->default('0g');
            $table->string('carbs')->default('0g');
            $table->string('time')->default('0');
            $table->string('difficult')->default('easy');
            $table->foreignIdFor(\App\Models\Category::class, 'type_id')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
