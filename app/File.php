<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = ['video'];
    public $directory = "/videos/";
    public function getVideoAttribute($key)
    {
        return $this->directory.$key;
    }
}
