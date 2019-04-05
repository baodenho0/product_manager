<?php

namespace App;

use Auth;
use DB;
use Hash;
use Route;
use Session;
use stdClass;

class BaseRoute
{
    public static function CheckOut()
    {

        Route::post('/delete-temp', function (\Illuminate\Http\Request $request) {
            try {
                $orders = Session::get('orderssss');
                unset($orders[$request->phone]);
                Session::forget("ordersss");
                Session::put('ordersss', $orders);

                return response()->json(["error_code" => "0", "message" => "Xóa bảng tạm thành công!"]);

            } catch (\Exception $e) {
                return response()->json(["error_code" => "1", "message" => "Xóa bảng tạm không thành công!"]);
            }
        })->name("delete-temp");
        Route::post('/delete-service', function (\Illuminate\Http\Request $request) {
            try {
                $orders = Session::get('ordersss');
                $services = $orders[$request->phone]->services;
                unset($services[$request->idd]);
                Session::forget("ordersss");
                Session::put('ordersss', $orders);
            } catch (\Exception $e) {

            }
        })->name("delete-service");
        Route::get('/order-table', function () {
            return view('pages.pay.checkout_print.blade');
        })->name("order-table");
        Route::get('pay', 'MenuController@payAction')->name('pay');
        Route::get('/pay-search', 'MenuController@searchPayAction')->name('pay-search');
        Route::get('/get-service-by-id', function (\Illuminate\Http\Request $request) {
            return \App\Product::find($request->id);
        })->name("get-service-by-id");
        Route::get('/get-clients-by-phone', function (\Illuminate\Http\Request $request) {
            return response()->json(\App\Client::where("phone", 'like', '%' . $request->search . '%')->orWhere("name", 'like', '%' . $request->search . '%')->orWhere("band", 'like', '%' . $request->search . '%')->get());
        })->name("get-clients-by-phone");

        Route::get('/get-client-by-phone', function (\Illuminate\Http\Request $request) {
            return \App\Client::where("phone", $request->phone)->first();
        })->name("get-client-by-phone");
        Route::get('/get-order-by-phone', function (\Illuminate\Http\Request $request) {
            $orders = Session::get('ordersss');
            if (array_key_exists($request->phone, $orders)) {
                return response()->json($orders[$request->phone]);
            }
        })->name("get-order-by-phone");
        Route::post('/checkout', function (\Illuminate\Http\Request $request) {
            $client = \App\Client::where("phone", $request->phone)->first();
            $orders = Session::get('ordersss');
            $order = $orders[$request->phone];
            DB::beginTransaction();
            try {
                $bill = new \App\Bill;
                //$bill->code=""; khỏi cần
                $bill->user_id = $order->user;
                $bill->client_id = $client->id;//id khách hàng, truoc day la company_id
                //$bill->note="";// khỏi cần
                $bill->casher_name = Auth::user()->name;
                $bill->bill_type_id = 2;
                $bill->discount = $request->discountss;
                $bill->save();
                $total = 0;
                foreach ($order->services as $service) {
                    $product_bill = new \App\ProductBill;
                    if ($service != null) {
                        $product_bill->product_id = $service['serviceId'];
                        $product_bill->bill_id = $bill->id;
                        $product_bill->quantity = $service['productQuantity'];
                        $product_bill->price = $service['productPrice'];
                        $total = $total + ($service['productQuantity'] * $service['productPrice']);
                        $product_bill->save();
                        $product = \App\Product::find($service['serviceId']);
                        $product->quantity = $product->quantity - $service['productQuantity'];
                        $product->save();
                    }
                }
                $bill->total = $request->totalss;
                $bill->save();
                DB::commit();
                unset($orders[$request->phone]);
                Session::forget("ordersss");
                Session::put('ordersss', $orders);
                return response()->json(["error_code" => "0", "message" => "Thanh toán thành công"]);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(["error_code" => "1", "message" => $e->getMessage()]);
            }
        })->name("order.checkout");
        Route::post('/save-order', function (\Illuminate\Http\Request $request) {
            try
            {
                $orders = Session::get('ordersss');
                $order = new stdClass();
                if ($orders == null || count($orders) == 0) {
                    $orders = [];
                }

                $client = \App\Client::where("phone", $request->phone)->first();

                $order->name = $request->serviceName;
                $order->serviceId = $request->serviceId;
                $order->phone = $request->phone;
                $order->services = $request->services;
                $order->band = $request->band;
                $order->cubic = $request->cubic;
                $order->user = $request->user;
                $order->discount = $request->discount;
                if($client==null)
                {
                    $orders[$order->phone] = $order;
                    Session::forget("ordersss");
                    Session::put('ordersss', $orders);
                    return response()->json(["error_code" => "0", "message" => "Lưu tạm thời thành công"]);
                }
                $order->clientName = $client->name;
                $orders[$order->phone] = $order;
                Session::forget("ordersss");
                Session::put('ordersss', $orders);
                return response()->json(["error_code" => "0", "message" => "Lưu tạm thời thành công"]);
            }
            catch (\Exception $e) {
                return response()->json(["error_code" => "1", "message" => $e->getMessage()]);
            }
        })->name("save-order");

    }

}