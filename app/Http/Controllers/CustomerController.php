<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\productType;
use App\Slide;
use App\Logo;
use DB;


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
        $data['slide'] = Slide::where('active','1')->get();
        
        $data['menu_dropdown_f'] = product::select( DB::raw('COUNT(product_types.id) as count') , 'product_types.name as name','product_types.image as image','product_types.slug as slug')
                        ->join('product_types' , 'products.product_type_id' ,'=', 'product_types.id')
                        ->groupBy('products.product_type_id')
                        ->orderBy(DB::raw('count(product_types.id)'),'DESC')->get();
        // $data['menu_dropdown_f'] = productType::all();
        $data['news_products'] = product::orderBy('id','DESC')->take(8)->get();

    	return view('customer.home.index',$data);
    }

    public function collections($slug){
        // $data['products'] = product::where('product_type_id','=','11')->get();
        // $data['products'] = productType::where('slug','=',$id)->get();
        // return view('customer.collections.index',$data);
        // $data['products'] = productType::where('slug','=',$id)->get();

        // $data['products'] = product::select('*')->paginate(10)
        // ->join('product_types','products.product_type_id','=','product_types.id')
        // ->where('product_types.slug','=',$slug)->get();

        $id = productType::where('slug','=',$slug)->get();
        if(count($id) !=0){
            $data['name'] = $id[0]->name;
            $id = $id[0]->id;
            // $id = $id->id;
            $data['products'] = product::where('product_type_id','=',$id)->paginate(15);
            return view('customer.collections.index',$data);
            // echo $data['products'];
        }
        else return back();
    }

    public function detail($slug, $slug_product){
        $slug = productType::where('slug',$slug)->get();
        if(count($slug) > 0) {
            $slug_product = product::where('slug',$slug_product)->get();
            if( count($slug_product) > 0 ){  
            $id = $slug->first()->id; 
            $data['slug_name'] = $slug->first()->name;                    
            $data['detail'] =  $slug_product->first(); 
            $data['relate'] = product::where('product_type_id',$id)->take(8)->inRandomOrder()->get();  
            return view('customer.detail.index',$data);
            }
            else return back();
        }
        else echo back();
        // return view('customer.detail.index');
    }

    public function test(){
        // $a = Cart::add('293ad123', 'Product 1', 1, 9.99);
        // if($a) echo "oke<hr>";
        $cart = Cart::content();
        echo "<pre>";
        print_r( $cart ); 
       // foreach ($cart as $c) {
       //     echo $c->name;
       // }
    }
    
}
