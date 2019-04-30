<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bill;
use App\productBill;
use App\Client;
use yajra\Datatables\Datatables;

class BillsController extends Controller
{
    //
    public function index(){
    	
    	return view('pages.list-bills.index');
    }

    public function loadDatatable(){
    	$bill = Bill::orderBy('id', 'DESC')->where('bill_type_order',1);
    	return Datatables::of($bill)
    	->editColumn('total',function($bill){
    		return number_format($bill->total);
    	})    	
    	->addColumn('detail',function($bill){
    		return '<a href="#" id=" '.$bill->id.' " class="detail btn btn-xs btn-warning"><i class="fa fa-eye"></i>Chi tiết</a>'; 
    	})
    	// ->editColumn('bill_status',function($bill){
    	// 	return $bill->bill_status ? 'Đã giao hàng' : 'Chưa giao hàng';
    	// })
    	->rawColumns(['detail'])
    	->make(true);
    }
    //ajax detail 
    public function detail(Request $request){ 
    		$bill = Bill::findorFail($request->id);
    		
    		// $bill->product_bill;
    		$bill->client;

    		$product_bill = productBill::where('bill_id',$request->id)
			->join('products','products.id','product_bills.product_id')
    		->get();
    		// echo $product_bill; die();

    		$output = array(
    			'bill' => $bill,
    			'product_bill' =>$product_bill,
    		);

    		return json_encode($output);
    	
    }
    //ajax update status
    public function updateStatus(Request $request){
    	$bill = Bill::findorFail($request->id);

    	$bill->bill_status = $bill->bill_status == "Đã giao hàng" ? "Chưa giao hàng" : "Đã giao hàng";
    	$bill->save();
    	// echo $bill->bill_status; die();
    	return "Thay đổi trạng thái thành công";
    }
}
