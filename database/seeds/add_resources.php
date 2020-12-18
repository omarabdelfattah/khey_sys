<?php

use Illuminate\Database\Seeder;
use App\Resource;
class add_resources extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         
        $resource = new Resource();
        $resource->name = "قطع إسفنجي";
        $resource->monthly_quantity = 5;
        $resource->save();

        $resource = new Resource();
        $resource->name = "ليف من السلك الناعم";
        $resource->monthly_quantity = 3;
        $resource->save();

        $resource = new Resource();
        $resource->name = "عطر إزالة الرائحة";
        $resource->monthly_quantity = 2;
        $resource->save();

        $resource = new Resource();
        $resource->name = "مواد تلميع";
        $resource->monthly_quantity = 7;
        $resource->save();

    }
}
