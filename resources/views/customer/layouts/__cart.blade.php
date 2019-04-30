{{-- @php
   $cart_content = Cart::content();
   // $cart_total = Cart::total(0,'','') - Cart::tax(0,'','');
@endphp --}}
{{-- empty - cart --}}
<div id="empty_cart" class="cart-widget-side">
   <div class="widget-heading">
      <h3 class="widget-title" data-translate="cart.header.widget_title">Shopping cart</h3>
      <a href="#" class="widget-close" data-translate="cart.header.widget_close">Close</a>
   </div>
   <div class="widget shopify widget_shopping_cart">
      <div class="widget_shopping_cart_content">
         <div class="shopping-cart-widget-body woodmart-scroll has-scrollbar">
            <div class="woodmart-scroll-content" tabindex="0">
               <ul class="cart_list product_list_widget shopify-mini-cart">
                  <li class="shopify-mini-cart__empty-message empty" data-translate="cart.header.no_item">No products in the cart.</li>
                  <p class="return-to-shop">
                     <a class="button wc-backward" href="index.html" data-translate="cart.header.return">Return To Shop</a>
                  </p>
               </ul>
               <!-- end product list -->
            </div>
         </div>
      </div>
   </div>
</div>

<div id="isset_cart" class="cart-widget-side">
   <div class="widget-heading">
      <h3 class="widget-title" data-translate="cart.header.widget_title">Shopping cart</h3>
      <a href="#" class="widget-close" data-translate="cart.header.widget_close">Close</a>
   </div>
   <div class="widget shopify widget_shopping_cart">
      <div class="widget_shopping_cart_content">
         <div class="shopping-cart-widget-body woodmart-scroll has-scrollbar">
            <div class="woodmart-scroll-content" tabindex="0" style="right: -17px;">
               <ul id="load_cart" class="cart_list product_list_widget shopify-mini-cart">
                  {{-- @foreach ($cart_content as $ct)
                     
                  
                  <li class="shopify-mini-cart-item mini_cart_item">
                     <a href="/cart/remove/" id="{{$ct->rowId}}" class="remove_cart remove-cart remove_from_cart_button">×</a>                   
                     <a href="/collections/shop/products/eames-lounge-chair?variant=7791006384170" class="cart-item-image">
                     <img width="100" height="130" src="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-8_100x130.jpg?v=1516095595" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-8_100x130.jpg?v=1516095595 100w, //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-8_131x150.jpg?v=1516095595 131w, //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-8.jpg?v=1516095595 700w, //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-8_88x100.jpg?v=1516095595 88w" sizes="(max-width: 100px) 100vw, 100px">
                     </a>
                     <div class="cart-info">
                        <span class="product-title">
                           <div class="">{{$ct->name}}</div>
                           
                        </span>
                        <span class="quantity">{{$ct->qty}} × <span class="shopify-Price-amount amount"><span class="money" data-currency-usd="$799.00">{{number_format($ct->price)}}đ</span></span></span>
                     </div>
                  </li>
                  @endforeach --}}

               </ul>
               <!-- end product list -->
            </div>
            <div class="woodmart-scroll-pane" style="display: none;">
               <div class="woodmart-scroll-slider" style="height: 735px; transform: translate(0px, 0px);"></div>
            </div>
         </div>
         <div class="shopping-cart-widget-footer">
            <p class="shopify-mini-cart__total total">
               <strong data-translate="cart.header.total">Subtotal:</strong> 
               <span class="shopify-Price-amount amount">
               <span class="money cart_total" ></span><span>đ</span>
               </span>
            </p>
            <p class="shopify-mini-cart__buttons buttons">
               <a href="/view-cart" class="button btn-cart wc-forward" data-translate="cart.header.view_cart">View cart</a>
               <a href="/checkout" class="button checkout wc-forward" data-translate="cart.header.checkout">Checkout</a>
            </p>
         </div>
      </div>
   </div>
</div>
