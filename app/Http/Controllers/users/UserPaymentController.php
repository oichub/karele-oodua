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
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$request->transaction_id}/verify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Authorization: Bearer FLWSECK_TEST-924a32c2ea4c89e9a6bd4d54eaaa0376-X"
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        print_r($response);
        // $res = json_decode($response);
        // echo $res->status;
       
        }
}
