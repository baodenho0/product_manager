@foreach ($news_products as $n_p)
<div class="product-grid-item product has-stars purchasable woodmart-hover-base quick-shop-on   product-with-swatches col-xs-6 col-sm-4 col-md-3 type-product status-publish has-post-thumbnail first instock sale hover-width-small hover-ready" >
   <div class="content-product-imagin"></div>
   <div class="product-element-top">
      <a href="/{{$n_p->productType->slug}}/{{$n_p->slug}}" class="product-image-link">
         <div class="product-labels labels-rounded"></div>
         <img src="/assets/upload/product/{{$n_p->image}}" class="attachment-shop_catalog size-shop_catalog" alt="{{$n_p->slug}}One Plus 3 Premium">
      </a>
      <div class="hover-img">
         <a href="/{{$n_p->productType->slug}}/{{$n_p->slug}}">
         <img src="/assets/upload/product/{{$n_p->image}}" class="attachment-shop_catalog size-shop_catalog" alt="{{$n_p->slug}}">
         </a>
      </div>
      {{-- 
      <div class="wrapp-swatches">
         <div class="swatches-on-grid"></div>
         <div class="product-compare-button">
            <a href="javascript:;" data-product-handle="one-plus-3-premium" data-product-title="One Plus 3 Premium" class="compare button"><span data-translate="compare_list.general.add_to_compare">Add to compare</span></a>
         </div>
      </div>
      --}}
   </div>
   <div class="product-information">
      <h3 class="product-title">
         {{-- <a href="/collections/furniture/products/one-plus-3-premium.html"> --}}
         <strong>{{$n_p->name}}</strong>
         {{-- <span class="">{{$n_p->slug}}</span> --}}
         {{-- <span class="lang2">{{$n_p->name}}</span> --}}
         {{-- </a> --}}
      </h3>
      {{-- 
      <div class="woodmart-product-cats"><a href="collections/clocks.html" title="">Clocks</a>,&nbsp;<a href="collections/demo-minimalism.html" title="">Demo minimalism</a>,&nbsp;<a href="collections/furniture.html" title="">Furniture</a>,&nbsp;<a href="collections/shop.html" title="">Shop</a></div>
      --}}
      <div class="product-rating-price">
         <div class="wrapp-product-price">
            <div class="star-rating">
               {{-- <span class="shopify-product-reviews-badge" data-id="1238892216362"></span> --}}
            </div>
            <span class="price">
            <span class="shopify-Price-amount amount"><span class="money">{{number_format($n_p->price)}}đ</span></span>
            </span>
         </div>
      </div>
      <div class="fade-in-block">
         <div class="hover-content">
            <div class="hover-content-inner">
               <div class="">{{$n_p->description}}</div>
            </div>
         </div>
         <div class="woodmart-buttons">
            <div class="wrap-wishlist-button">
               <a href="javascript:;" data-product-handle="one-plus-3-premium" data-product-title="One Plus 3 Premium" class="add_to_wishlist" title="Add to wishlist"><span data-translate="wish_list.general.add_to_wishlist">Add to wishlist</span></a>
               <div class="clear"></div>
            </div>
            <div class="woodmart-add-btn" data-original-title="" title=""><a  id="{{$n_p->id}}"  class="add_to_cart button product_type_variable add_to_cart_button add-to-cart-loop"> 
               <span data-translate="products.product.sold_out">Sold Out</span> 
               </a>
            </div>
            <div class="wrap-quickview-button">
               <div class="quick-view">
                  <a href="products/one-plus-3-premium95b3.html?view=quickview" class="quickview-icon quickview open-quick-view woodmart-tltp">
                  <span data-translate="collections.general.quickview">Quick View</span>
                  </a> 
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endforeach