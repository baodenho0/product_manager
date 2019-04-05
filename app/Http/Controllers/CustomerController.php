<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\productType;

class CustomerController extends Controller
{
    //
    public function __construct(){
    	// $productType = productType::all();
    	// foreach ($productType as $pt) {
    	// 	echo $pt->name."<br>";
    	// }
    	
    }

    public function index(){

    	return view('customer.home.index');
    }

    public function test(){
    	$productType = productType::first();

    	echo $productType->product;
    	
    }
    
}
