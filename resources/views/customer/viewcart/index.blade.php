@extends('customer.layouts.master')
@section('title','View Cart')
@section('customCSS')
<link rel="stylesheet" href="css/paginate.css">
@endsection
@section('content')
<div class="main-page-wrapper">
   <div class="page-title page-title-default title-size-default color-scheme-light title-design-centered" style="background-color: #0a0a0a; ">
      <div class="container">
         <header class="entry-header">
            <h1 class="entry-title" style="display:none;">
               <span>
               <span class="lang1">Your Shopping Cart</span>
               <span class="lang2">Your Shopping Cart</span>
               </span>
            </h1>
            <div class="woodmart-checkout-steps">
               <ul>
                  <li class="step-cart step-active">
                     <a href="/cart">
                     <span data-translate="cart.header.widget_title">Shopping cart</span>
                     </a>
                  </li>
                  <li class="step-checkout step-inactive">
                     <a href="/checkout">
                     <span data-translate="cart.header.checkout">Checkout</span>
                     </a>
                  </li>
               </ul>
            </div>
         </header>
      </div>
   </div>
   <style>
      .page-title-default { 
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: default;
      background-position: center center;
      }
   </style>
   <div class="container">
      <div class="row content-layout-wrapper">
         <div class="site-content col-sm-12">
            <div id="shopify-section-cart-template" class="shopify-section">
               <div class="page-width" data-section-id="cart-template" data-section-type="cart-template">
                  <div class="entry-content">
                     <div class="shopify-cart">
                        <div class="shopify cart-content-wrapper">
                           <form action="/view-cart" method="post"  class="shopify-cart-form cart-data-form">
                            {{csrf_field()}}
                              <div class="cart-table-section">
                                 <table class="shop_table shop_table_responsive cart shopify-cart-form__contents">
                                    <thead>
                                       <tr>
                                          <th class="product-remove">&nbsp;</th>
                                          <th class="product-thumbnail">&nbsp;</th>
                                          <th class="product-name" data-translate="cart.label.product">Product</th>
                                          <th class="product-price" data-translate="cart.label.price">Price</th>
                                          <th class="product-quantity" data-translate="cart.label.quantity">Quantity</th>
                                          <th class="product-subtotal" data-translate="cart.label.total">Total</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($cart_view as $cv)

                                       <tr class="shopify-cart-form__cart-item cart_item">
                                          <td class="product-remove"><a href="/remove" id="{{$cv->rowId}}" class="remove remove_cart">×</a></td>
                                          <td class="product-thumbnail" data-label="Product">
                                             <a href="/products/facilisis-ligula-aliquet?variant=9791071780906">
                                             <img class="cart__image" src="/assets/upload/product/{{$cv->options->image}}" alt="Facilisis ligula aliquet - L / Black">
                                             </a>
                                          </td>
                                          <td class="product-name">
                                             <a href="/products/facilisis-ligula-aliquet?variant=9791071780906">
                                                <div class="">{{$cv->name}}</div>
                                                {{-- <div class="lang2">Facilisis ligula aliquet</div> --}}
                                             </a>
                                             {{-- <div class="cart__meta-text" style="width: 100%;">
                                                Size: L<br>
                                                Color: Black<br>
                                             </div> --}}
                                          </td>
                                          <td class="product-price" data-label="Price"> 
                                             <span class="shopify-Price-amount amount">
                                             <span class="money" >{{number_format($cv->price)}}đ</span>
                                             </span> 
                                          </td>
                                          <td class="product-quantity" data-label="Quantity">
                                             <div class="quantity">
                                                <input type="hidden" name='id[]' value="{{$cv->rowId}}">
                                                <input type="button" value="-" class="minus reduced" data='{{$cv->id}}'>
                                                <input type="number" name="updates[]"  id='{{$cv->id}}' value="{{$cv->qty}}" min="0" size="4" > 
                                                <input type="button" value="+" class="plus increase" data='{{$cv->id}}'>
                                                
                                             </div>
                                          </td>
                                          <td class="product-subtotal" data-title="Total">
                                             <span class="shopify-Price-amount amount">
                                             <span class="money" data-currency-usd="$599.00">{{number_format($cv->price*$cv->qty)}}đ</span>
                                             </span>
                                          </td>
                                       </tr>

                                      @endforeach
                                    </tbody>
                                 </table>
                                 <div class="row cart-actions">
                                    <div class="col-sm-6" style="text-align: left;">
                                       <a href="/" class="button" style="margin-bottom: 5px;"><span data-translate="cart.general.continue">Continue Shopping</span></a>
                                    </div>
                                    <div class="col-sm-6">
                                       <button type="submit" class="button" style="margin-bottom: 5px;"><span >Update Shopping Cart</span></button>                   
                                    </div>
                                 </div>
                                 <div class="row cart-actions">
                                    <div class="col-md-12" style="text-align: left; margin-top: 30px;">
                                       <label for="CartSpecialInstructions">Special instructions for seller</label>
                                       <textarea name="note" style="min-height: 85px;" id="CartSpecialInstructions" class="cart__note"></textarea>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <div class="cart-totals-section">
                              <div class="cart_totals">
                                 <div class="cart-totals-inner">
                                    {{-- <form action="/cart" method="post" class="shopify-cart-form cart-data-form"> --}}
                                       <h2 data-translate="cart.general.carttotals">CART TOTALS</h2>
                                       <table cellspacing="0" class="shop_table shop_table_responsive">
                                          <tbody>
                                             {{-- <tr class="cart-subtotal">
                                                <th data-translate="cart.general.subtotal">Total</th>
                                                <td data-title="Subtotal">
                                                   <span class="shopify-Price-amount amount">
                                                   <span class="money" data-currency-usd="<span id=&quot;bk-cart-subtotal-price&quot;>$599.00</span>"><span id="bk-cart-subtotal-price"></span></span>
                                                   </span>
                                                </td>
                                             </tr>
                                             <tr class="shipping">
                                                <th data-translate="cart.header.shipping">Shipping</th>
                                                <td data-title="Shipping">
                                                   <div class="shopify-shipping-calculator">
                                                      <p><a href="#collapse-shipping" class="shipping-calculator-button collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-shipping" data-translate="cart.shipping.title">Calculate shipping</a></p>
                                                     
                                                   </div>
                                                </td>
                                             </tr> --}}
                                             <tr class="order-total">
                                                <th data-translate="cart.general.subtotal">Total</th>
                                                <td data-title="Total">
                                                   <strong><span class="shopify-Price-amount amount"><span class="money" data-currency-usd="<span id=&quot;bk-cart-subtotal-price&quot;>$599.00</span>"><span id="bk-cart-subtotal-price">{{number_format($cart_total)}}đ</span></span></span></strong> 
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <div class="wc-proceed-to-checkout"> 
                                          {{-- <input type="submit" name="checkout" class="checkout-button button alt wc-forward"  value="Proceed to checkout"> --}}
                                          <a href="/checkout" class="checkout-button button alt wc-forward">Proceed to checkout</a>
                                       </div>
                                    {{-- </form> --}}
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@section('customJS')
<script src="assets/customJS.js" type="text/javascript"></script>
<script src="assets/ajax.shoppingcart.js" type="text/javascript"></script>
<script>
  $(document).ready(function(){
    $('.plus').on('click',function(){
      var data = $(this).attr('data');
      var i = $("#"+data+"").val();
      if(i >= 0)
        i++;
      $('#'+data+'').val(i);
    });

    $('.minus').on('click',function(){
      var data = $(this).attr('data');
      var i = $("#"+data+"").val();
      if(i > 0)
        i--;
      $('#'+data+'').val(i);  
    });

    $('.remove_cart').on('click',function(){
      setInterval( function() {
                   window.location.reload();
 
          },1000);
    });

  });
</script>
@endsection
@endsection