<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{      
    protected $fillable = [
        'name', 'price', 'date','time', 'file', 'user_id', 'slug',
    ];   
}
