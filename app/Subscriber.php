<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function video(){
        return $this->belongsTo('App\Video');
    }
    public function file(){
        return $this->belongsTo('App\File');
    }
}
