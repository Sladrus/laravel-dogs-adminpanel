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
        Schema::create('dog_dog_parent', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Dog::class, 'dog_id')->nullable();
            $table->foreignIdFor(\App\Models\DogParent::class, 'dog_parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dog_dog_parent');
    }
};
