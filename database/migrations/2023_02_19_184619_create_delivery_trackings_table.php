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
        Schema::create('delivery_trackings', function (Blueprint $table) {
            $table->id();
            $table->string('nameRecipient');
            $table->string('street');
            $table->string('phone');
            $table->string('email');
            $table->string('status');
            $table->unsignedBigInteger('orderId');
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
            $table->json('products');
            $table->string('userid');
            $table->decimal('subtotal');
            $table->string('total');
            $table->enum('paid/unpaid', ['0', '1'])->default('0');
            $table->unsignedBigInteger('deliverboyId');
            $table->foreign('deliverboyId')->references('id')->on('deliver_men')->onDelete('cascade');
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
        Schema::dropIfExists('delivery_trackings');
    }
};
