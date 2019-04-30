<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;

class ProductManagementController extends Controller
{
    public function index()
    {
       $data['productType'] = ProductType::all();
        return view('pages.product-management.index',$data);
    }

    public function load()
    {
        
        $product = Product::all();
        return Datatables::of($product)
        ->editColumn('image',function($product){
        	return "<img height='80px' src='../assets/upload/product/".$product->image." ' />";
        })
        ->addColumn('str_money',function($product){
        	return number_format($product->price);
        })
        ->addColumn('str_import_price',function($product){
        	return number_format($product->import_price);
        })
        ->addColumn('str_income',function($product){
        	return number_format($product->income);
        })
        ->addColumn('name_producttype',function($product){
        	return $product->productType->name;
        })
        ->addColumn('action', function ($product) {
        	return '<a href="#" id=" '.$product->id.' " class="edit btn btn-xs btn-warning"><i class="fa fa-eye"></i>Cập nhật</a> <a href="#" id="'. $product->id .'" class="delete btn btn-xs btn-danger btn-delete"><i class="fa fa-times"></i> Xóa</a>';
    	})
    	->rawColumns(['action','image'])
    	->make(true);

    }

    public function postdata(Request $request){
    	$validate = Validator::make($request->all(),[
    		'code'=>'required',
    		'name'=>'required',
    		// 'description'=>'required',
    		'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    		'colors'=>'required',
    		'quantity'=>'required',
    		'import_price'=>'required',
    		'percent_discount'=>'required',
    		'income'=>'required',
    	]);

    	$error_array = array();
    	$success_output = '';
    	if($validate->fails()){
    		foreach ($validate->messages()->getMessages() as $field_name => $messages) {
    			$error_array[] = $messages;
    		}
    	}else{
    		if($request->get('button_action') == "insert"){
    		$product = new Product;
    		$product->code = $request->code;
    		$product->name = $request->name;
    		$product->slug = str_slug($request->name);
    		$product->description = $request->description;
    		$product->colors = $request->colors;
    		$product->quantity = $request->quantity;
    		$product->import_price = $request->import_price;
    		$product->percent_discount = $request->percent_discount;
    		$product->income = $request->income;
    		$product->product_type_id = $request->product_type_id;
    		$product->price = $request->import_price - (( $request->import_price * $request->percent_discount)/100) + $request->income;
    		// --- upload img
	    	if($request->hasFile('image')){
	    	$img = $request->file('image');
			$img_name = str_random(4)."-".$img->getClientOriginalName();
			// unlink('assets/upload/product/'.$product->image);
			$img->move('assets/upload/product',$img_name);
			$product->image = $img_name;
			}
			else {
				$product->image = 'null';
			}
			// --- 
    		$product->save();
    		$success_output = '<div class="alert alert-success">Thêm thành công</div>';
    		} else

    		if($request->get('button_action') == "update"){
    			$product = Product::find($request->get('product_id'));
    			// return $product;
    			$product->code = $request->code;
	    		$product->name = $request->name;
	    		$product->slug = str_slug($request->name);
	    		$product->description = $request->description;
	    		$product->colors = $request->colors;
	    		$product->quantity = $request->quantity;
	    		$product->import_price = $request->import_price;
	    		$product->percent_discount = $request->percent_discount;
	    		$product->income = $request->income;
	    		$product->product_type_id = $request->product_type_id;
	    		$product->price = $request->import_price - (( $request->import_price * $request->percent_discount)/100) + $request->income;
	    		// --- upload img
		    	if($request->hasFile('image')){
		    	$img = $request->file('image');
				$img_name = str_random(4)."-".$img->getClientOriginalName();
				if($product->image != "null")
				unlink('assets/upload/product/'.$product->image);
				$img->move('assets/upload/product',$img_name);
				$product->image = $img_name;
				}
				// --- 
	    		$product->save();
	    		$success_output = '<div class="alert alert-success">Cập nhật thành công</div>';
    		}
    	}
    	$output = array(
    		'error' => $error_array,
    		'success' => $success_output,
    	);
    	echo json_encode($output);

    }

    public function editdata(Request $request){
    	$id = $request->input('id');
    	$product = Product::find($id);
    	$output = array(
    		'code' => $product->code,
    		'name' => $product->name,
    		'description' => $product->description,
    		'colors' => $product->colors,
    		'quantity' => $product->quantity,
    		'import_price' => $product->import_price,
    		'percent_discount' => $product->percent_discount,
    		'income' => $product->income,
    		'product_type_id' => $product->product_type_id,
    		'product_id' => $product->product_id,
    	);
    	echo json_encode($output);
    }

    public function deletedata(Request $request){
    	$product = Product::find($request->input('id'));
    	if(file_exists('assets/upload/product/'.$product->image)){
        unlink('assets/upload/product/'.$product->image);
        }
        $product->delete();
        return 'Xóa thành công';
    }

    

}
