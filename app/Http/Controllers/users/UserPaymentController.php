<?php

namespace App\Http\Controllers\users;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserPaymentController extends Controller
{
    public function makepayment(){
       
        $user =User::where('email', Auth::user()->email)->firstOrFail();
        return view('users.user.account.deposit', compact(['user']));
    }
    public function verifypayment(Request $request){
        return $request->transaction_id;
    }
}
