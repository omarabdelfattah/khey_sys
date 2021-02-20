<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMosquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosques', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->timestamps();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('area');
            $table->string('emam');
            $table->string('moazen');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mosques');
    }
}
