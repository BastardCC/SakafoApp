<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contains', function (Blueprint $table) {
            $table->integer('plate_id')->unsigned()->index();
            $table->foreign('plate_id')->references('plate_id')->on('plates')->onDelete('cascade');
            $table->integer('ingredient_id')->unsigned()->index();
            $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients')->onDelete('cascade');
            $table->integer('quantity');
            $table->primary(['plate_id', 'ingredient_id']);
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
        Schema::dropIfExists('contains');
    }
}
