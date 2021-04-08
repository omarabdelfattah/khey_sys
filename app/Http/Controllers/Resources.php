<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use DataTables;
use App\Http\Requests\addResource;

class Resources extends Controller
{
    public function __construct(){
        $this->middleware('Permission:resources_show',['only'=>'index','getresources']);
        $this->middleware('Permission:resources_add',['only'=>'addResource','store_resource']);
        $this->middleware('Permission:resources_edit',['only'=>'editResource','update_resource']);
        $this->middleware('Permission:resources_delete',['only'=>'delete_resource']);
    }    
    public function index(){
        $page_title = "Resources";
        return view('dashboard.resources.resources',compact('page_title'));
    }
    public function getResources(Request $request){
        if ($request->ajax()) {
          // Get all table columns names
        $data = Resource::latest();
         
        $data = $data->get();

        return Datatables::of($data)
        ->addColumn('resource_name', function($row){
            return $row->name;
        })
        ->addColumn('monthly_quantity', function($row){
        return $row->monthly_quantity;
        })
        ->addColumn('stock_quantity', function($row){
            return $row->stock_quantity;
        })
        ->addColumn('created_at', function($row){
            return date("Y-m-d",strtotime($row->created_at));
        })
       ->addColumn('action', function($row){})->rawColumns(['action'])->make(true);
         }
    }
     public function addResource(){
        $Resource = null;
        $page_title = "إضافة مورد";
        return view('dashboard.resources.addResource',compact('page_title'))->with('Resource');
    }
    public function editResource($id){
        // Edit resource
        $id = intval($id);
        $resource = Resource::find($id);
        $page_title = "تعديل مورد ".$resource->name;

        return view('dashboard.resources.editResource',compact('page_title'))->with('resource',$resource);
    }

    public function store_resource(addResource $request){
         try{
            $resource = new Resource();
            $resource->name = $request->name;
            $resource->monthly_quantity = $request->monthly_quantity;
            $resource->stock_quantity = $request->stock_quantity;
            $resource->save();

            return \Redirect::back()->with('success', 'تم الإضافة بنجاح'); 
              
        }catch (\Exception $e){
            return \Redirect::back()->with('error', 'فشل إضافة المورد');
        }        
    }

    public function update_resource(addResource $request, $id ){
        $resource = Resource::find($id);

        if(isset($resource)){
            $resource->name = !empty($request->name) ? $request->name : $resource->name;
            $resource->monthly_quantity = !empty($request->monthly_quantity) ? $request->monthly_quantity : $resource->monthly_quantity;
            $resource->stock_quantity = !empty($request->stock_quantity) ? $request->stock_quantity : $resource->stock_quantity;
            $resource->save();
            if(count($resource->getChanges()) > 0 ){
                return \Redirect::back()->with('success', 'تم التعديل بنجاح');   
            }
            return \Redirect::back();
        }
        return \Redirect::back()->with('error', 'فشل تعديل المورد');

    }

    public function delete_resource($id){
        try{
            $resource = Resource::find($id);
            if($resource){
                $destroy = Resource::destroy($id);
                if($destroy){
                    return \Redirect::back()->with('success', "تم حذف مورد   ".$resource->name."  بنجاح");                    
                }
            }
            
        }catch (\Exception $e){
            return \Redirect::back()->with('error','فشل حذف المورد');
        }
    }

}
