<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemoFile extends Model
{
    protected $fillable = [
        'name',
    ]; 
    public $directory="/images/events/";

    public function getNameAttribute($value)
{
    return $this->directory . $value;
}
}
