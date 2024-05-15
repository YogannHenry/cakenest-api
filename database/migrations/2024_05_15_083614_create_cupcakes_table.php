<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCupcakesTable extends Migration
{
    public function up()
    {
        Schema::create('cupcakes', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->boolean('is_available');
            $table->boolean('is_advertised');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cupcakes');
    }
}

