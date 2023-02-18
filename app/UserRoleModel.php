<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends Model
{
    protected $table="user_role";
    // protected $primaryKey="state_id";
    protected $fillable = ['user_id','role_id','created_at', 'updated_at'];
}
