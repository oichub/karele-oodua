<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    //
    protected $fillable = [
        'user_id', 'amount', 'plan', 'status', 'end_date'
    ];
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
