<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\AdminGroup;
use DataTables;
use App\Http\Requests\addAdmin;
use App\Http\Requests\UpdateAdmin;
class Users extends Controller
{
    public function __construct(){
        $this->middleware('Permission:users_show',['only'=>'index','getUsers']);
        $this->middleware('Permission:users_add',['only'=>'addUser','store_user']);
        $this->middleware('Permission:users_edit',['only'=>'editUser','update_user']);
        $this->middleware('Permission:users_delete',['only'=>'delete_user']);
    }

    public function index(){
        $page_title = "المستخدمين";
        return view('dashboard.users.users',compact('page_title'));
    }
    public function getUsers(Request $request){
        if ($request->ajax()) {
          // Get all table columns names
         $data = Admin::latest();
         
         $data = $data->with(['group'])->get();

         return Datatables::of($data)
         ->addColumn('name', function($row){
             return $row->name;
         })
         ->addColumn('username', function($row){
           return $row->username;
       })
       ->addColumn('created_at', function($row){
           
           return date("Y-m-d",strtotime($row->created_at));
       })
       ->addColumn('admin_group', function($row){

           return $row->group->name;
       })
      
       ->addColumn('action', function($row){})->rawColumns(['action'])->make(true);
         }
     }
   public function addUser(){
       $user = null;
       $page_title = "إضافة مستخدم";
       $groups = AdminGroup::get();
       return view('dashboard.users.addUser',compact('page_title'))->with('user')->with('groups',$groups);
   }
       public function editUser($id){
       // Edit user
       $id = intval($id);
       $user = Admin::find($id);
       $groups = AdminGroup::get();
       $page_title = "تعديل مستخدم ".$user->name;

       return view('dashboard.users.editUser',compact('page_title'))->with('user',$user)->with('groups',$groups);
   }
   public function store_user(addAdmin $request){
        try{
           $mosque = new Admin();
           $mosque->name = $request->name;
           $mosque->username = $request->username;
           $mosque->password = bcrypt( $request->password );
           $mosque->role = $request->role;
           $mosque->save();

           
           return \Redirect::back()->with('success', 'تم الإضافة بنجاح');   
       }catch (\Exception $e){


           return \Redirect::back()->with('error', 'فشل إضافة المستخدم');
       }        
   
   }
   public function update_user(UpdateAdmin $request, $id ){
       $user = Admin::find($id);

       if( isset($request->password) && $request->password != null && strlen($request->password) < 4 ){ 
           return \Redirect::back()->with('error', 'أقل حد لحقل password 4 حرف');
        }
       if(isset($user)){
           $user->name = !empty($request->name) ? $request->name : $user->name;
           $user->username = !empty($request->username) ? $request->username : $user->username;
           $user->password = !empty($request->password) && strlen($request->password) > 4 ? bcrypt($request->password) : $user->password;
           $user->role = !empty($request->role) ? $request->role : $user->role;
           $user->save();
           if(count($user->getChanges()) > 0 ){
               return \Redirect::back()->with('success', 'تم التعديل بنجاح');   
           }
           return \Redirect::back();
       }
       return \Redirect::back()->with('error', 'فشل تعديل المستخدم');

   }
   public function delete_user($id){
       try{
           $admin = Admin::find($id);
           if($admin){
               $destroy = Admin::destroy($id);
               if($destroy){
                   return \Redirect::back()->with('success', 'تم حذف المستخدم '.$admin->name.' بنجاح');                    
               }
           }
           
       }catch (\Exception $e){
           return \Redirect::back()->with('error','فشل حذف المستخدم');
       }
   }

}
