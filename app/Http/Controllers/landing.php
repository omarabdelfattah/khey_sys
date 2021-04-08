<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mosque;
use App\Order;
use App\Admin;

class landing extends Controller
{
    public function index(){
        $page_title = "الصفحة الرئيسية";
        // Get total mosques count
        $mosques_count = Mosque::count();    
        $mosques_orderd =  Order::count();
        $no_order =  $mosques_count - $mosques_orderd;

        $orderd_waiting = Order::where('order_status',0)->count();
        $orderd_declined  = Order::where('order_status',1)->count();
        $orderd_accepted =  Order::where('order_status',2)->count();
        $admin_count    = Admin::count();
        $donut_parts1  =  [
                            ['name' => "نعم" , "size" => $mosques_orderd , "color" => "#54a0ff" ],
                            ['name' => "لا" , "size" => $no_order , "color" => "#ee5253" ],
                        ];
        $donut_parts2  =  [
                            ['name' => "نعم" , "size" => $orderd_accepted , "color" => "#54a0ff" ],
                            ['name' => "لا" , "size" => $orderd_declined , "color" => "#ee5253" ],
                        ];
        return view('dashboard.index',compact('page_title',
                                                'donut_parts1',
                                                'donut_parts2',
                                                'mosques_count',
                                                'mosques_orderd',
                                                'no_order',
                                                'mosques_orderd',
                                                'orderd_waiting',
                                                'orderd_declined',
                                                'orderd_accepted',
                                                'admin_count'));
    }
}
