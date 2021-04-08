<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    protected $table = 'admin_groups';
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',

        'mosques_show',
        'mosques_add',
        'mosques_edit',
        'mosques_delete',

        'resources_show',
        'resources_add',
        'resources_edit',
        'resources_delete',

        'orders_show',
        'orders_add',
        'orders_edit',
        'orders_delete',

        'admin_groups_show',
        'admin_groups_add',
        'admin_groups_edit',
        'admin_groups_delete',

        'users_show',
        'users_add',
        'users_edit',
        'users_delete'
    ];
}
