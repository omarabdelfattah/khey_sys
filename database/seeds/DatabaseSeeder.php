<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(add_resources::class);
        $this->call(add_mosq::class);
        $this->call(add_admin_groups::class);
        $this->call(add_admins::class);
    }
}
