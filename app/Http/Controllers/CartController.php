<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use Cart;

class CartController extends Controller
{
    //
    
    public function __construct(){
    	
    }

    public function addCart(Request $request){
    	$product = product::find($request->id); 
    	$quantity = $request->quantity > 1 ? $request->quantity : 1;   	
    	Cart::add($request->id, $product->name, $quantity, $product->price,['image'=>$product->image]);    	
    	return "Đã thêm vào giỏ hàng";    	
    }

    public function getContent(){
    	// Cart::destroy();
    	$content = Cart::content();    	
    	$cart_count = Cart::count();
      	$cart_total = Cart::total(0,'','') - Cart::tax(0,'','');

      	$a = $this->loadCart($content);

    	$output = array(
    		'cart_count'=>$cart_count,
    		'cart_total'=>$cart_total,
    		'list' => $a,
    	);    	
    	return json_encode($output);
    }

    public function removeContent(Request $request){
    	$id =  $request->id;
    	Cart::remove($id);
    	return "Xóa thành công";
    }

    public function loadCart($content){
    	$a = array();
    	$i = 0;
    	foreach ($content as $ct) {
    		$i++;
    		$a[] = "<li class='shopify-mini-cart-item mini_cart_item'>
                     <a href='/cart/remove/'' id='$ct->rowId' class='remove_cart remove-cart remove_from_cart_button'>×</a>                   
                     <a href='/collections/shop/products/eames-lounge-chair?variant=7791006384170' class='cart-item-image'>
                     <img width='100' height='130' src='/assets/upload/product/".$ct->options->image."' class='attachment-shop_thumbnail size-shop_thumbnail wp-post-image' alt='' sizes='(max-width: 100px) 100vw, 100px'>
                     </a>
                     <div class='cart-info'>
                        <span class='product-title'>
                           <div class=''>$ct->name</div>
                           
                        </span>
                        <span class='quantity'>$ct->qty × <span class='shopify-Price-amount amount'><span class='money' data-currency-usd='$799.00'>".number_format($ct->price)."đ</span></span></span>
                     </div>
                  </li>";
    		
    	}    	
    	return $a;
    }
    
}
