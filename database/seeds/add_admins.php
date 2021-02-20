<?php

use Illuminate\Database\Seeder;
use App\Admin;

class add_admins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new Admin();
        $user->name = "محمد أحمد";
        $user->username = "mohamed";
        $user->password = bcrypt(123456);
        $user->role = 0;
        $user->save();

        $user = new Admin();
        $user->name = "صلاح السيد";
        $user->username = "salah";
        $user->password = bcrypt(123456);
        $user->role = 1;
        $user->save();

        $user = new Admin();
        $user->name = "عمر عبدالفتاح";
        $user->username = "omar";
        $user->password = bcrypt(123456);
        $user->role = 2;
        $user->save();

    }
}
