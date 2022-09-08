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
        Schema::create('cats_coffees', function (Blueprint $table) {
            $table->foreignId('cat_id')->constrained('cats')->references('id')->cascadeOnDelete();
            $table->foreignId('coffee_id')->constrained('coffees')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cats_coffees');
    }
};
