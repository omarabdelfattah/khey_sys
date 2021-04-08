<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminGroup;
use DataTables;
use App\Http\Requests\addadminGroup;

class admin_groups extends Controller
{
    public function __construct(){
        $this->middleware('Permission:admin_groups_show',['only'=>'index','get_admin_groups']);
        $this->middleware('Permission:admin_groups_add',['only'=>'add_admin_groups','store_admin_groups']);
        $this->middleware('Permission:admin_groups_edit',['only'=>'editadmin_groups','update_admin_groups']);
        $this->middleware('Permission:admin_groups_delete',['only'=>'delete_admin_group']);
    }
    public function index(){
        $page_title = "مجموعات المشرفين";
        return view('dashboard.admin_groups.admin_groups',compact('page_title'));
    }
    public function get_admin_groups(Request $request){
        if ($request->ajax()) {
          // Get all table columns names
        $data = AdminGroup::latest();
         
        $data = $data->get();

        return Datatables::of($data)
        ->addColumn('admin_group_name', function($row){
            return $row->name;
        })
       ->addColumn('action', function($row){})->rawColumns(['action'])->make(true);
         }
    }
     public function add_admin_groups(){
        $admin_group = null;
        $page_title = "إضافة مجموعة مشرفين";
        return view('dashboard.admin_groups.addGroup',compact('page_title'))->with('admin_group',$admin_group);
    }
    public function editadmin_groups($id){
        // Edit admin group
        $id = intval($id);
        $admin_group = AdminGroup::find($id);
        $page_title = "تعديل المجموعة   ".$admin_group->name;

        return view('dashboard.admin_groups.editGroup',compact('page_title'))->with('admin_group',$admin_group);
    }
    public function store_admin_groups(addadminGroup $request){
 
        try{
           $admin_group = new AdminGroup();

           $admin_group->name = $request->name;

           $admin_group->mosques_show = isset($request->mosques_show) ? $request->mosques_show : 0 ;
           $admin_group->mosques_add = isset($request->mosques_add) ? $request->mosques_add : 0 ;
           $admin_group->mosques_edit = isset($request->mosques_edit) ? $request->mosques_edit : 0 ;
           $admin_group->mosques_delete = isset($request->mosques_delete) ? $request->mosques_delete : 0 ;
           
           $admin_group->resources_show = isset($request->resources_show) ? $request->resources_show : 0 ;
           $admin_group->resources_add = isset($request->resources_add) ? $request->resources_add : 0 ;
           $admin_group->resources_edit = isset($request->resources_edit) ? $request->resources_edit : 0 ;
           $admin_group->resources_delete = isset($request->resources_delete) ? $request->resources_delete : 0 ;
           
           $admin_group->orders_show = isset($request->orders_show) ? $request->orders_show : 0 ;
           $admin_group->orders_add = isset($request->orders_add) ? $request->orders_add : 0 ;
           $admin_group->orders_edit = isset($request->orders_edit) ? $request->orders_edit : 0 ;
           $admin_group->orders_delete = isset($request->orders_delete) ? $request->orders_delete : 0 ;
           
           $admin_group->admin_groups_show = isset($request->admin_groups_show) ? $request->admin_groups_show : 0 ;
           $admin_group->admin_groups_add = isset($request->admin_groups_add) ? $request->admin_groups_add : 0 ;
           $admin_group->admin_groups_edit = isset($request->admin_groups_edit) ? $request->admin_groups_edit : 0 ;
           $admin_group->admin_groups_delete = isset($request->admin_groups_delete) ? $request->admin_groups_delete : 0 ;
           
           $admin_group->users_show = isset($request->users_show) ? $request->users_show : 0 ;
           $admin_group->users_add = isset($request->users_add) ? $request->users_add : 0 ;
           $admin_group->users_edit = isset($request->users_edit) ? $request->users_edit: 0 ;
           $admin_group->users_delete = isset($request->users_delete) ? $request->users_delete : 0 ;
           

           $admin_group->save();
            
           
           return \Redirect::back()->with('success', 'تم الإضافة بنجاح');   
       }catch (\Exception $e){

        return $e;
           return \Redirect::back()->with('error', 'فشل إضافة المجموعة');
       }        
   
   }
   public function update_admin_groups(addadminGroup $request, $id ){
    $group = AdminGroup::find($id);

    
    if(isset($group)){
        $group->name = !empty($request->name) ? $request->name : $group->name;
        
        $group->mosques_show = isset($request->mosques_show) ? $request->mosques_show : $group->mosques_show ;
        $group->mosques_add = isset($request->mosques_add) ? $request->mosques_add : $group->mosques_add ;
        $group->mosques_edit = isset($request->mosques_edit) ? $request->mosques_edit : $group->mosques_edit ;
        $group->mosques_delete = isset($request->mosques_delete) ? $request->mosques_delete : $group->mosques_delete ;
        
        $group->resources_show = isset($request->resources_show) ? $request->resources_show : $group->resources_show ;
        $group->resources_add = isset($request->resources_add) ? $request->resources_add : $group->resources_add  ;
        $group->resources_edit = isset($request->resources_edit) ? $request->resources_edit : $group->resources_edit ;
        $group->resources_delete = isset($request->resources_delete) ? $request->resources_delete : $group->resources_delete ;
        
        $group->orders_show = isset($request->orders_show) ? $request->orders_show : $group->orders_show  ;
        $group->orders_add = isset($request->orders_add) ? $request->orders_add : $group->orders_add ;
        $group->orders_edit = isset($request->orders_edit) ? $request->orders_edit : $group->orders_edit ;
        $group->orders_delete = isset($request->orders_delete) ? $request->orders_delete : $group->orders_delete ;
        
        $group->admin_groups_show = isset($request->admin_groups_show) ? $request->admin_groups_show : $group->admin_groups_show ;
        $group->admin_groups_add = isset($request->admin_groups_add) ? $request->admin_groups_add : $group->admin_groups_add ;
        $group->admin_groups_edit = isset($request->admin_groups_edit) ? $request->admin_groups_edit : $group->admin_groups_edit ;
        $group->admin_groups_delete = isset($request->admin_groups_delete) ? $request->admin_groups_delete : $group->admin_groups_delete ;
        
        $group->users_show = isset($request->users_show) ? $request->users_show : $group->users_show ;
        $group->users_add = isset($request->users_add) ? $request->users_add : $group->users_add ;
        $group->users_edit = isset($request->users_edit) ? $request->users_edit: $group->users_edit ;
        $group->users_delete = isset($request->users_delete) ? $request->users_delete : $group->users_delete ;

        $group->save();

        if(count($group->getChanges()) > 0 ){
            return \Redirect::back()->with('success', 'تم التعديل بنجاح');   
        }
        return \Redirect::back();
    }
    return \Redirect::back()->with('error', 'فشل تعديل المجموعة');

}
public function delete_admin_group($id){
    try{
        $group = AdminGroup::find($id);
        if($group){
            $destroy = AdminGroup::destroy($id);
            if($destroy){
                return \Redirect::back()->with('success', 'تم حذف مجموعة '.$group->name.' بنجاح');                    
            }
        }
        
    }catch (\Exception $e){
        return \Redirect::back()->with('error','فشل حذف المجموعة');
    }
}
}
