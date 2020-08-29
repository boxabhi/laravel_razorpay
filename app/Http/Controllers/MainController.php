<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Payment;
use Razorpay\Api\Api;
use Session;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }

    public function success(){
        return view('success');
    }

    //rzp_test_hL4Etd0bXHkmO1
    //Gluvl9s5qfTBfbL1Ar8tCsnG


    public function payment(Request $request){

        $name = $request->input('name');
        $amount = $request->input('amount');

        $api = new Api('rzp_test_hL4Etd0bXHkmO1', 'Gluvl9s5qfTBfbL1Ar8tCsnG');
        $order  = $api->order->create(array('receipt' => '123', 'amount' => $amount * 100 , 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; 

        $user_pay = new Payment();
    
        $user_pay->name = $name;
        $user_pay->amount = $amount;
        $user_pay->payment_id = $orderId;
        $user_pay->save();

        Session::put('order_id', $orderId);
        Session::put('amount' , $amount);

        return redirect('/');




    }


    public function pay(Request $request){
        $data = $request->all();
        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        $user->payment_done = true;
        $user->razorpay_id = $data['razorpay_payment_id'];
        $user->save();
        return redirect('/success');

       
    }


}
