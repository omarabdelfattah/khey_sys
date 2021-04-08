<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('admin_groups',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->bigincrements('id');
            $table->string('name');

            $table->boolean('mosques_show')->default(0);
            $table->boolean('mosques_add')->default(0);
            $table->boolean('mosques_edit')->default(0);
            $table->boolean('mosques_delete')->default(0);

            $table->boolean('orders_show')->default(0);
            $table->boolean('orders_add')->default(0);
            $table->boolean('orders_edit')->default(0);
            $table->boolean('orders_delete')->default(0);

            $table->boolean('resources_show')->default(0);
            $table->boolean('resources_add')->default(0);
            $table->boolean('resources_edit')->default(0);
            $table->boolean('resources_delete')->default(0);

            $table->boolean('admin_groups_show')->default(0);
            $table->boolean('admin_groups_add')->default(0);
            $table->boolean('admin_groups_edit')->default(0);
            $table->boolean('admin_groups_delete')->default(0);
            
            $table->boolean('users_show')->default(0);
            $table->boolean('users_add')->default(0);
            $table->boolean('users_edit')->default(0);
            $table->boolean('users_delete')->default(0);
            
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
        //
    }
}
