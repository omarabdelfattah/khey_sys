<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    protected $table = 'order_items';
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

}
