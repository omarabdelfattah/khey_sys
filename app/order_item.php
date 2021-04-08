<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    protected $table = 'orders_items';
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'resource_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

        //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    
    public function order(){
        return $this->belongsTo('App\Order','id','order_id');
    }

    public function resource(){
        return $this->hasOne('App\Resource','id','resource_id');
    }

     
    
}
