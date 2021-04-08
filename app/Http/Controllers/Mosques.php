<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mosque;
use DataTables;
use App\Http\Requests\addMosq;
use App\Http\Requests\updateMosq;

class Mosques extends Controller
{
    public function __construct(){
        $this->middleware('Permission:mosques_show',['only'=>'index','getMosques']);
        $this->middleware('Permission:mosques_add',['only'=>'addMosque','store_mosque']);
        $this->middleware('Permission:mosques_edit',['only'=>'editMosque','update_mosque']);
        $this->middleware('Permission:mosques_delete',['only'=>'delete_mosque']);
    }
    
    public function index(){
        $page_title = "Mosques";
        return view('dashboard.mosques.mosques',compact('page_title'));
    }
    public function getMosques(Request $request){
         if ($request->ajax()) {
           // Get all table columns names
          $data = Mosque::latest();
          
          $data = $data->with(['orders'])->get();
 
          return Datatables::of($data)
          ->addColumn('mosque_name', function($row){
              return $row->name;
          })
          ->addColumn('username', function($row){
            return $row->username;
        })
        ->addColumn('created_at', function($row){
            
            return date("Y-m-d",strtotime($row->created_at));
        })
        ->addColumn('monthly_order', function($row){

            return $row->orderd_this_month($row->id);
        })
        ->addColumn('area', function($row){
            return $row->area;
        })
        ->addColumn('emam', function($row){
            return $row->emam;
        })
        ->addColumn('moazen', function($row){
            return $row->moazen;
        })
        ->addColumn('action', function($row){})->rawColumns(['action'])->make(true);
          }
      }
    public function addMosque(){
        $mosque = null;
        $page_title = "إضافة مسجد";
        return view('dashboard.mosques.addMosque',compact('page_title'))->with('mosque');
    }
    public function editMosque($id){
        // Edit mosque
        $id = intval($id);
        $mosque = Mosque::find($id);
        $page_title = "تعديل مسجد ".$mosque->name;

        return view('dashboard.mosques.editMosque',compact('page_title'))->with('mosque',$mosque);
    }
    public function store_mosque(addMosq $request){
         try{
            $mosque = new Mosque();
            $mosque->name = $request->name;
            $mosque->username = $request->username;
            $mosque->password = bcrypt( $request->password );
            $mosque->area = $request->area;
            $mosque->emam = $request->emam;
            $mosque->moazen = $request->moazen;
            $mosque->save();
 
            
            return \Redirect::back()->with('success', 'تم الإضافة بنجاح');   
        }catch (\Exception $e){

 
            return \Redirect::back()->with('error', 'فشل إضافة المسجد');
        }        
    
    }
    public function update_mosque(updateMosq $request, $id ){
        $mosque = Mosque::find($id);

        if( isset($request->password) && $request->password != null && strlen($request->password) < 4 ){ 
            return \Redirect::back()->with('error', 'أقل حد لحقل password 4 حرف');
         }
        if(isset($mosque)){
            $mosque->name = !empty($request->name) ? $request->name : $mosque->name;
            $mosque->username = !empty($request->username) ? $request->username : $mosque->username;
            $mosque->password = !empty($request->password) && strlen($request->password) > 4 ? bcrypt($request->password) : $mosque->password;
            $mosque->area = !empty($request->area) ? $request->area : $mosque->area;
            $mosque->moazen = !empty($request->moazen) ? $request->moazen : $mosque->moazen;
            $mosque->emam = !empty($request->emam) ? $request->emam : $mosque->emam;
            $mosque->save();
            if(count($mosque->getChanges()) > 0 ){
                return \Redirect::back()->with('success', 'تم التعديل بنجاح');   
            }
            return \Redirect::back();
        }
        return \Redirect::back()->with('error', 'فشل تعديل المسجد');

    }
    public function delete_mosque($id){
        try{
            $mosq = Mosque::find($id);
            if($mosq){
                $destroy = Mosque::destroy($id);
                if($destroy){
                    return \Redirect::back()->with('success', 'تم حذف مسجد '.$mosq->name.' بنجاح');                    
                }
            }
            
        }catch (\Exception $e){
            return \Redirect::back()->with('error','فشل حذف المسجد');
        }
    }

}
