<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_items', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->timestamps();
            $table->biginteger("order_id")->unsigned();
            $table->foreign("order_id")->references("id")->on('orders')->onDelete('cascade');;
            $table->biginteger("resource_id")->nullable()->unsigned();
            $table->foreign("resource_id")->references("id")->on('resources')->onDelete('set null');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_items');
    }
}
