<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\order_item;
use App\Resource;
use DataTables;
use Illuminate\Support\Facades\Schema;


class Orders extends Controller{
    public function __construct(){
        $this->middleware('Permission:orders_show',['only'=>'index','getOrders','getOrderDetails']);
        $this->middleware('Permission:orders_edit',['only'=>'orderDecline','orderApprove']);
    }
    public function index(){
        $page_title = "Orders";
        
        return view('dashboard.orders',compact('page_title'));

    }
    public function getOrders(Request $request){
          // dd(Order::latest()->get());

          if ($request->ajax()) {
             // Get all table columns names
            $data = Order::latest();
            
            $data = $data->with(['Mosque'])->get();

            return Datatables::of($data)
            ->addColumn('mosque_name', function($row){
                return $row->Mosque->name;
            })
            ->addColumn('action', function($row){})->rawColumns(['action'])->make(true);
            }
        }
    public function getOrderDetails(Request $request){
        if ($request->ajax()) {
            // Get order items
            if(isset( $request->get('search')['value'])){
                $req = $request->get('search')['value'];
                $data = order_item::with(['resource'])
                    ->join('resources', 'resources.id', '=', 'resource_id')
                    ->where('order_id', $request->order_id)
                    ->where(function($q) use($req){
                        $q->orWhere('resources.name', 'LIKE', '%' . $req . '%')
                        ->orWhere('resources.stock_quantity', 'LIKE', '%' . $req . '%')
                        ->orWhere('resources.stock_quantity', 'LIKE', '%' . $req . '%');
                    })->get();

            }else{
                $data = order_item::with(['resource'])->where('order_id', $request->order_id)
                    ->get();
            }
 
              return Datatables::of($data)
             ->addColumn('resource_name', function($row){
                
                 return $row->resource->name;
            })
            ->addColumn('monthly_quantity', function($row){
                return $row->resource->monthly_quantity;
            })
            ->addColumn('stock_quantity', function($row){
                return ( $row->resource->stock_quantity);
            })
             ->toJson();
        }
    }
    public function orderApprove(Request $request){
        $order_id = $request->input("id");
        $order = Order::find((int) $order_id);
        $order_status = $order->order_status;
        if($order_status < 2){
            $order->order_status = 2;
            $order->save();
            if(count($order->getChanges()) > 0   AND $order_status < 2 ){
                // get all order resources ids
                $resources = order_item::with(['resource'])
                ->join('resources', 'resources.id', '=', 'resource_id')
                ->where('order_id', $order_id)->get();
                
                foreach($resources as $resource){
                    // update stock quantity
                    $resource = Resource::find((int) $resource->id);
                    $resource->stock_quantity -=  $resource->monthly_quantity;
                    $resource->save();  
                }
            }
            return ['status'=> 200, 'st' => true, 'message'=> "تم قبول الطلب بنجاح"];
        }
        return ['status'=> 200, 'st' => false, 'message'=> "لم يتغير شئ"];        
    }
    public function orderDecline(Request $request){
        $order_id = $request->input("id");
        $order = Order::find($order_id);
        $order_status = $order->order_status;
         if($order_status > 1 OR $order_status < 1 ){
            $order->order_status = 1;
            $order->save();
            if(count($order->getChanges()) > 0 AND $order_status == 2 ){
                // get all order resources ids
                $resources = order_item::with(['resource'])
                ->join('resources', 'resources.id', '=', 'resource_id')
                ->where('order_id', $order_id)->get();
                
                foreach($resources as $resource){
                    // update stock quantity
                    $resource = Resource::find((int) $resource->id);
                    $resource->stock_quantity +=  $resource->monthly_quantity;
                    $resource->save();  
                }
            }
            return ['status'=> 200,  'st' => true , 'message'=> "تم رفض الطلب بنجاح"];
        }
        return ['status'=> 200,  'st' => false, 'message'=> "لم يتغير شئ"];        
    }
    public function delete_order($id){
        try{
            $order = Order::find($id);
            if($order){
                $destroy = Order::destroy($id);
                if($destroy){
                    return \Redirect::back()->with('success', "تم حذف الطلب بنجاح");                    
                }
            }
            
        }catch (\Exception $e){
            return \Redirect::back()->with('error','فشل حذف الطلب');
        }
    }
}
