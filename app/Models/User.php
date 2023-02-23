<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // function roles_admin(){
    //     // return auth()->user()->id;
    //     return $this->hasOne('App\Role','name','id');
    // }

    
    function roles_admin(){
        // return auth()->user()->id;
        return $this->hasOne('App\UserRoleModel','user_id','id');
    }


    protected $table="users";
    protected $primarykey = "id";
    protected $fillable = ['name', 'address', 'contact', 'email', 'dob', 'password', 'username', 'image', 'created_at', 'updated_at', 'user_role'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
