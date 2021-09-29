<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'url', 'date', 'time', 'chat', 'user_id', 'slug',
    ];
}
