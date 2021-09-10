<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{      
    protected $fillable = [
        'name', 'embeded', 'date','time', 'chat', 'user_id', 'slug', 
    ];   

    public function demo_file(){
        return $this->belongsTo("App\DemoFile");
    }
}
