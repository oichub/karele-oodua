<?php

namespace App\Http\Controllers\users;

use App\User;
use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {        
        $data = [];
        $data['items'] = [
            [
                'name' => $request->name,
                'price' => $request->amount,                
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $request->amount;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        return redirect('/users/user/makepayment')->withError('Your payment is canceled');                    
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        // return $response;
        $tx_ref= "RX1_". (substr(rand(0, time()), 0, 7));
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            Account::create([
                'user_id' => Auth::user()->id,
                'transaction_id' => $response['TOKEN'],
                'ref' =>  $tx_ref,
                'status' => $response['ACK'],
                'payment_method' => 'paypal',
                'payment_type' => 'card',
                'payment_reference' => $response['CORRELATIONID'],
                'amount' => $response['AMT'],
            ]);  
            $bal = User::where('id', Auth::user()->id)->firstOrFail();
            $getbal = $bal->balance;
            $newbal = $response['AMT'] + $getbal;
    
            $data['newbal'] = User::where('id', Auth::user()->id)->first()->update([
                'balance' => $newbal,
            ]);           
            return redirect('/users/user/makepayment')->withSuccess('Payment made successfully');                
            // dd('Your payment was successfully. You can create success page here.');
        }

        return redirect('/users/user/makepayment')->withError("Couldn't complete transaction, Please Try later");
    }
}
