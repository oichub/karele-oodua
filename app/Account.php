<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'ref', 'status', 'payment_method'
    ];
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
}
