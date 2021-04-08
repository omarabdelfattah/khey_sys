<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';
    // protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username' , 'password','role',
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

    public function group_id(){
        return $this->hasOne('App\AdminGroup','id','role');
    }
    
    public function group(){
        return $this->hasOne('App\AdminGroup','id','role');
    }
 }
