<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests;
use Cart;
use App\Bill;
use App\Client;
use App\ProductBill;
use Validator;

class CheckoutController extends Controller
{
    //
    public function index(){   
        $content = Cart::content();
        // echo $content;
        // die(); 	
        if(Cart::count() > 0)
    	return view('customer.checkout.index');
        else return redirect('/');
    }

    public function postCheckout(Request $request){ 	
    	$validator = Validator::make($request->all(),[
    		'email'=>'required',
    		'phone'=>'required',
    		'name'=>'required',
    		'address'=>'required',
    	],[

    	]);
    	if ($validator->fails()) {
            return redirect('/checkout')->withErrors($validator)->withInput();
        }    
                 
        if(Cart::count() == 0) return redirect('/');

        Cart::content();
        $total = $cart_total = Cart::total(0,'','') - Cart::tax(0,'','');

        $check_client = Client::where('phone',$request->phone)->first();
        if($check_client){
            $check_client->name = $request->name;
            $check_client->phone = $request->phone;
            $check_client->email = $request->email;
            $check_client->address = $request->address;
            $check_client->save();

            $bill = new Bill;
            $bill->user_id = '2';
            $bill->client_id = $check_client->id;
            $bill->company_id = '';
            $bill->bill_type_id = 2;
            $bill->total = $total;
            $bill->discount = 0;
            $bill->casher_name = '';
            $bill->bill_type_order = 1; // order online | bill_type_order = 1
            $bill->save();

            foreach (Cart::content() as $ct) {
                $product_bill = new ProductBill;
                $product_bill->bill_id = $bill->id;
                $product_bill->product_id = $ct->id;
                $product_bill->quantity = $ct->qty;
                $product_bill->price = $ct->price;
                $product_bill->save();
            }
            
        }
        else{
            $client = new Client;
            $client->name = $request->name;
            $client->band = '';
            $client->cubic ='';
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->address = $request->address;
            $client->save();

            $bill = new Bill;
            $bill->user_id = '2';
            $bill->client_id = $client->id;
            $bill->company_id = '';
            $bill->bill_type_id = 2;
            $bill->total = $total;
            $bill->discount = 0;
            $bill->casher_name = '';
            $bill->bill_type_order = 1; // order online | bill_type_order = 1
            $bill->save();

            foreach (Cart::content() as $ct) {
                $product_bill = new ProductBill;
                $product_bill->bill_id = $bill->id;
                $product_bill->product_id = $ct->id;
                $product_bill->quantity = $ct->qty;
                $product_bill->price = $ct->price;
                $product_bill->save();
            }
        }    	
        
        // return redirect('/checkout')->with('message','Success');

        $data['client'] = client::find($bill->client_id);
        return view('customer.checkout.thankyou',$data);

    }

    // public function thankyou($id){
    //     $data['client'] = client::find($id);
    //     return view('customer.checkout.thankyou',$data);

    // }

    //ajax check phone 
    public function getCheckPhone(Request $request){
    	$client = Client::where('phone',$request->phone)->first();
    	$output = [
    		'email' =>$client->email,
    		'name' => $client->name,
    		'address' => $client->address,
    	];
    	echo json_encode($output);
    }

    //ajax destroy Cart 
    public function destroyCart(){
        Cart::destroy();
    }
    //view cart
    public function viewcart(){
        $data['cart_view'] = Cart::content();
        $data['cart_total'] = Cart::total(0,'','') - Cart::tax(0,'','');;
        if(Cart::count() == 0)
            return redirect('/');
        return view('customer.viewcart.index',$data);
    }

    public function postviewcart(Request $request){         
        for($i = 0; $i < count($request->id); $i++){
            $rowId = $request->id[$i];
            $qty = $request->updates[$i];
            Cart::update($rowId, $qty);
        }
        return back();
    }

    // public function test(){
    //     $content = Cart::content();
    //     echo $content;
    //     echo "<hr>";
    //     foreach ($content as $ct) {
    //        echo $ct->id."<br>";
    //     }
        
    // }
}
