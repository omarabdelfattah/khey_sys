<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'monthly_quantity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
