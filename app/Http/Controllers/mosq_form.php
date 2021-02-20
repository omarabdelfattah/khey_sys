<?php

namespace App\Http\Controllers;
use Auth;
use Maherelgamil\Arabicdatetime\Facades\Arabicdatetime;
use Illuminate\Http\Request;
use App\Mosque;
use App\Resource;
use App\Order;
use App\order_item;
use Illuminate\Database\QueryException;

class mosq_form extends Controller
{
    //
    public function showForm(Request $request){
        
        $page_title = 'إضافة طلبات المسجد الشهرية';

        
        // Check if this month ordering available or not

     
            $last = date("Y-m",strtotime(Auth::user()->last_order));
            $now = date('Y-m');
            if( $last == $now ){
                return view("front.no_form",compact('page_title'));
            }

        $resources = Resource::get(['name','id']);
        return view("front.form",compact('page_title','resources'));
    }
    public function store(Request $request){
        try{
            $order = new Order();
            $order->mosq_id = Auth::id();
            $order->order_status = 0;
            $order->save();
    
            
        if($request->input_monthly_needs == 1){
            $items = Resource::get(['id']);
        }elseif($request->input_monthly_needs == 2){
            $items = $request->order_items;
        }
        if($request->input_monthly_needs > 0){
            $order_items = [];
            foreach($items as $item_key => $item_id  ){
                $order_items[] = [
                    'order_id'      => $order->id,
                    'resource_id'   =>  $item_id['id']
                ];
            }
            foreach($order_items as $order_item){
                order_item::create($order_item);
            }
        }

            return \Redirect::route('form')->with('success', 'تم الحفظ بنجاح !');

        }catch (\Exception $e){
            return  $e;
            return \Redirect::route('form')->with('error', 'لم يتم إرسال الطلب يرجي المحاولة لاحقاً');
        }        

    }
}
