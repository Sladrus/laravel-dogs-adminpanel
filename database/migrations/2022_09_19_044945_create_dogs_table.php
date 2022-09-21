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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(\App\Models\DogType::class, 'dog_type_id')->nullable();
            $table->foreignIdFor(\App\Models\DogParent::class, 'dog_parent_id')->nullable();
            $table->string('icon')->nullable();
            $table->integer('price')->nullable()->default(0);
            $table->string('desc');
            $table->string('age');
            $table->string('gender');
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
        Schema::dropIfExists('dogs');
    }
};
