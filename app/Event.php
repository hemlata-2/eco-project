<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $table="events";
    // protected $primaryKey="state_id";
    protected $fillable = ['title', 'start', 'end'];
    public $timestamps = false;
}
