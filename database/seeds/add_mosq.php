<?php

use Illuminate\Database\Seeder;
use App\Mosque;
class add_mosq extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $resource = new Mosque();
        $resource->username = "aleman123";
        $resource->name = "الإيمان";
        $resource->password = bcrypt(123);
        $resource->area = "خيطان";
        $resource->emam = "محمد أحمد";
        $resource->moazen = "صلاح السيد";

        $resource->save();    
    }
}
