<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigincrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('phone');
            $table->integer("mosq_id")->length(10)->unsigned();
            $table->foreign("mosq_id")->references("id")->on('mosques')->onDelete('cascade');
 
            $table->boolean('order_status');

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
}
