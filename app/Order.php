<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mosq_id', 'status', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
    
    public function order_items(){
        return $this->hasMany('App\order_item','order_id','id');
    }

    public function Mosque(){
        return $this->hasOne('App\Mosque','id','mosq_id');
    }


 
}
