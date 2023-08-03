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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->string('photo');
            // $table->string('brand');
            $table->string('description');
            $table->string('color');
            $table->string('size')->nullable();
            $table->integer('quantity');
            // $table->enum('choices', ['1', '2'])->default('1');
            // $table->integer('sold')->default(0);
            $table->unsignedBigInteger('categoryid');
            $table->unsignedBigInteger('brandId');
            $table->foreign('categoryid')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brandId')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
