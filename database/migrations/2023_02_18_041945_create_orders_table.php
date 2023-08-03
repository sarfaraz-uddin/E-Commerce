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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('country');
            $table->string('street1');
            // $table->string('street2');
            $table->string('town');
            $table->string('province');
            $table->string('phone');
            $table->string('email');
            $table->json('products');
            $table->string('userid');
            $table->enum('acceptreject', [0,1])->nullable();
            $table->decimal('subtotal');
            $table->decimal('total');            
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
        Schema::dropIfExists('orders');
    }
};
