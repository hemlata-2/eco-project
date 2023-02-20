<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
        protected $table="role";
        protected $primaryKey="id";
        protected $fillable = ['name','created_at', 'updated_at'];
}
