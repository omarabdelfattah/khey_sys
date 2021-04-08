<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigincrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->biginteger("role")->unsigned()->nullable();
            $table->foreign("role")->references("id")->on('admin_groups')->onDelete('set null');
            $table->boolean('protected')->default(0);
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
        Schema::dropIfExists('users');
    }
}
