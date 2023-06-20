<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('generic_name');
            $table->string('form');
            $table->string('restriction_formula')->nullable();
            $table->integer('price');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->boolean('faskes1')->default(0);
            $table->boolean('faskes2')->default(0);
            $table->boolean('faskes3')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('medicines');
    }
}
