<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    //
    protected $fillable = ['file_id', 'user_id', 'title', 'date', 'slug'];

    public $direct = "/videos";
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function file(){
        return $this->belongsTo('App\File');
    }
   
}
