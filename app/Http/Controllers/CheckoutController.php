<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class CheckoutController extends Controller
{
    public function saveorderdata(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|digits:10',
            'address'=>'required',
         ], [
            'name.required' => 'Please fill the name before checkout !',
            'email.required'=>'Please fill the email before checkout !',
            'email.email'=>'Please fill the valid email address !',
            'phone.required' => 'Please fill the mobile number before checkout !',
            'phone.digits' => 'Phone number must contain 10 digits !',
            'address.required'=>'Please fill the delivery address before checkout !',

        ]);


         session()->put('kaichocartname', $request->name);
         session()->put('kaichocartemail', $request->email);
         session()->put('kaichocartphone', $request->phone);
         session()->put('kaichocartaddress', $request->address);

         return view('frontend.paymentdetails');
    }


    public function cashOnDelivery(){


        $totalproduct = $total_price = 0;

        if(session()->get('kaichocart')){
            $carts = session()->get('kaichocart');
        foreach($carts as $cart){

        $total_price += $cart['total_price'];


        }
        $total_product = count(session()->get('kaichocart'));
        }
        DB::beginTransaction();
        $order_id = time().'_'.Str::random(10);

        $order = new Order;
        $order['receiver_name'] = session()->get('kaichocartname');
        $order['receiver_phone'] = session()->get('kaichocartphone');
        $order['email'] = session()->get('kaichocartemail');
        $order['shipping_address'] = session()->get('kaichocartaddress');
        $order['total_product'] = $total_product;
        $order['total_price'] = $total_price;
        $order['payment_type'] = "Cash on delivery";
        $order['payment_status'] = '0';
        $order['order_id'] = $order_id;
        $order['guest_id'] = $order_id;
        $order->save();




        foreach($carts as $cart){
            $orderdetail = new OrderDetail;
            $orderdetail['order_id'] = $order->id;
            $orderdetail['product_id'] = $cart['id'];
            $orderdetail['quantity'] = $cart['quantity'];
            $orderdetail['total_price'] = $cart['total_price'];
            $orderdetail->save();
        }


        DB::commit();
        session()->forget('uaques_order_id');

        session()->forget('uaquesorderdetails');
        session()->forget('kaichocart');
        session()->forget('kaichocartname');
        session()->forget('kaichocartemail');
        session()->forget('kaichocartphone');
        session()->forget('kaichocartaddress');
        session()->put('kaichoorderid', $order->id);



        return redirect()->route('submit.complete');
                // dd('success');





    }






    public function qrScan(Request $request){
        $validated = $request->validate([
            'image' => 'required',
        ]);


        $filename = null;
        $uploadedFile = $request->file('image');
        $filename = time().'_'. $uploadedFile->getClientOriginalName();


        Storage::disk('public')->putFileAs(
            'payment',
            $uploadedFile,
            $filename
        );



        $totalproduct = $total_price = 0;

        if(session()->get('kaichocart')){
            $carts = session()->get('kaichocart');
        foreach($carts as $cart){

        $total_price += $cart['total_price'];


        }
        $total_product = count(session()->get('kaichocart'));
        }
        DB::beginTransaction();
        $order_id = time().'_'.Str::random(10);

        $order = new Order;
        $order['payment_image'] = 'payment/'.$filename;

        $order['receiver_name'] = session()->get('kaichocartname');
        $order['receiver_phone'] = session()->get('kaichocartphone');
        $order['email'] = session()->get('kaichocartemail');
        $order['shipping_address'] = session()->get('kaichocartaddress');
        $order['total_product'] = $total_product;
        $order['total_price'] = $total_price;
        $order['payment_type'] = "QR Scan";
        $order['payment_status'] = '1';
        $order['order_id'] = $order_id;
        $order['guest_id'] = $order_id;
        $order->save();




        foreach($carts as $cart){
            $orderdetail = new OrderDetail;
            $orderdetail['order_id'] = $order->id;
            $orderdetail['product_id'] = $cart['id'];
            $orderdetail['quantity'] = $cart['quantity'];
            $orderdetail['total_price'] = $cart['total_price'];
            $orderdetail->save();
        }


        DB::commit();
        session()->forget('uaques_order_id');

        session()->forget('uaquesorderdetails');
        session()->forget('kaichocart');
        session()->forget('kaichocartname');
        session()->forget('kaichocartemail');
        session()->forget('kaichocartphone');
        session()->forget('kaichocartaddress');
        session()->put('kaichoorderid', $order->id);


        // return view('frontend.completeorder');
                return redirect()->route('submit.complete');
                // dd('success');





    }

    public function completeorder(){

        $order_id = session()->get('kaichoorderid');

        $order = Order::find($order_id);

        return view('frontend.completeorder' , compact('order'));
    }
}
