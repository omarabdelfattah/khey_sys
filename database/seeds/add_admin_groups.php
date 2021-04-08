<?php

use Illuminate\Database\Seeder;
use App\AdminGroup;
class add_admin_groups extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new AdminGroup();
        $user->name = "مدير الإدارة";

        $user->mosques_show = 1;
        $user->mosques_add = 1;
        $user->mosques_edit = 1;
        $user->mosques_delete = 1;

        $user->resources_show = 1;
        $user->resources_add = 1;
        $user->resources_edit = 1;
        $user->resources_delete = 1;

        $user->orders_show = 1;
        $user->orders_add = 1;
        $user->orders_edit = 1;
        $user->orders_delete = 1;

        $user->admin_groups_show = 1;
        $user->admin_groups_add = 1;
        $user->admin_groups_edit = 1;
        $user->admin_groups_delete = 1;

        $user->users_show = 1;
        $user->users_add = 1;
        $user->users_edit = 1;
        $user->users_delete = 1;
        
        $user->save();



        $user = new AdminGroup();
        $user->name = "مدخل بيانات";

        $user->mosques_show = 1;
        $user->mosques_add = 1;
        $user->mosques_edit = 1;
        $user->mosques_delete = 1;

        $user->resources_show = 1;
        $user->resources_add = 1;
        $user->resources_edit = 1;
        $user->resources_delete = 1;


        $user->save();

        $user = new AdminGroup();
        $user->name = "أمين خزنة";

   
        $user->resources_show = 1;
        $user->resources_add = 1;
        $user->resources_edit = 1;
        $user->resources_delete = 1;


        $user->save();
    }
}
