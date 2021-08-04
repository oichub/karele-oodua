<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{      
    protected $fillable = [
        'name', 'price', 'date','time', 'file', 'user_id', 'slug', 'description', ' demo_file_id'
    ];   

    public function demo_file(){
        return $this->belongsTo("App\DemoFile");
    }
}
