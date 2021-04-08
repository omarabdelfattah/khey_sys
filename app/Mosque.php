<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Order;
class Mosque extends Authenticatable
{
    
    protected $table = 'mosques';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password','area','moazen','emam'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    
    protected $rememberTokenName = false;

    public function orders(){
        return $this->hasMany('App\Order','mosq_id','id');
    }
    
    public static function orderd_this_month($mosq_id = null){
        if($mosq_id == null){return false;}
        $year = date('Y');
        $month = date('m');
        $last_order = Order::where("mosq_id","=",$mosq_id)
            ->whereYear('created_at','=',$year)
            ->whereMonth('created_at','=',$month)->count();
         if($last_order > 0){
            return true;
        }
        return false;
    }
}
