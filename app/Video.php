<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    //
    protected $fillable = ['embeded', 'user_id', 'title', 'date', 'slug'];

    public function user(){
        return $this->belongsTo('App\User');
    }
   
}
