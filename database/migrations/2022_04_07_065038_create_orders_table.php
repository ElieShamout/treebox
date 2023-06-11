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
            $table->integer('sender_id');
            $table->string('future_name');
            $table->string('future_phone');
            $table->string('future_email');
            $table->string('future_address');
            $table->integer('cost');
            $table->integer('weight');
            $table->integer('width');
            $table->integer('height');
            $table->integer('thickness');
            $table->text('note')->nullable();
            $table->boolean('state')->default(0);
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
