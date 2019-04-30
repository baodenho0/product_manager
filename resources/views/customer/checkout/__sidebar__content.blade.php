@php
   $cart = Cart::content();
   $total = Cart::total(0,'','') - Cart::tax(0,'','');     
@endphp

<div class="sidebar__content">
   <div id="order-summary" class="order-summary order-summary--is-collapsed" data-order-summary>
      <h2 class="visually-hidden-if-js">Order summary</h2>
    <div class="order-summary__sections">
        <div class="order-summary__section order-summary__section--product-list">
            <div class="order-summary__section__content">
               <table class="product-table">
                  <caption class="visually-hidden">Shopping cart</caption>
                 {{--  <thead class="product-table__header">
                     <tr>
                        <th scope="col"><span class="visually-hidden">Product image</span></th>
                        <th scope="col"><span class="visually-hidden">Description</span></th>
                        <th scope="col"><span class="visually-hidden">Quantity</span></th>
                        <th scope="col"><span class="visually-hidden">Price</span></th>
                     </tr>
                  </thead>  --}}
                  <tbody data-order-summary-section="line-items">
					@foreach ($cart as $c)
					
                    <tr class="product" data-product-id="790550872106" data-variant-id="9791703056426" data-product-type="Furniture" data-customer-ready-visible>
                        <td class="product__image">
                           <div class="product-thumbnail">
                              <div class="product-thumbnail__wrapper">
                                 <img alt="{{$c->name}}" class="product-thumbnail__image" src="/assets/upload/product/{{$c->options->image}}" />
                              </div>
                              <span class="product-thumbnail__quantity" aria-hidden="true">{{$c->qty}}</span>
                           </div>
                        </td>
                        <td class="product__description">
                           <span class="product__description__name order-summary__emphasis">{{$c->name}}</span>
                           {{-- <span class="product__description__variant order-summary__small-text">Red</span> --}}
                        </td>
                        <td class="product__quantity visually-hidden">
                           1
                        </td>
                        <td class="product__price">
                           <span class="order-summary__emphasis">{{number_format($c->price * $c->qty)}}đ</span>
                        </td>
                    </tr>

					@endforeach
                  </tbody>


               </table>
               <div class="order-summary__scroll-indicator" aria-hidden="true" tabindex="-1">
                  Scroll for more items
                  <svg aria-hidden="true" focusable="false" class="icon-svg icon-svg--size-12">
                     <use xlink:href="#down-arrow" />
                  </svg>
               </div>
            </div>
        </div>


        <div class="order-summary__section order-summary__section--total-lines" data-order-summary-section="payment-lines">
            <table class="total-line-table">
               <caption class="visually-hidden">Cost summary</caption>
               <thead>
                  <tr>
                     <th scope="col"><span class="visually-hidden">Description</span></th>
                     <th scope="col"><span class="visually-hidden">Price</span></th>
                  </tr>
               </thead>
               {{-- <tbody class="total-line-table__tbody">
                  <tr class="total-line total-line--subtotal">
                     <th class="total-line__name" scope="row">Subtotal</th>
                     <td class="total-line__price">
                        <span class="order-summary__emphasis" data-checkout-subtotal-price-target="85000">
                        $850.00
                        </span>
                     </td>
                  </tr>
                  <tr class="total-line total-line--shipping">
                     <th class="total-line__name" scope="row">
                        Shipping
                     </th>
                     <td class="total-line__price">
                        <span class="order-summary__small-text" data-checkout-total-shipping-target="0">
                        Calculated at next step
                        </span>
                     </td>
                  </tr>
                  <tr class="total-line total-line--taxes " data-checkout-taxes>
                     <th class="total-line__name" scope="row">Taxes</th>
                     <td class="total-line__price">
                        <span class="order-summary__emphasis" data-checkout-total-taxes-target="8500">$85.00</span>
                     </td>
                  </tr>
               </tbody> --}}
               <tfoot class="total-line-table__footer">
                  <tr class="total-line">
                     <th class="total-line__name payment-due-label" scope="row">
                        <span class="payment-due-label__total">Total</span>
                     </th>
                     <td class="total-line__price payment-due">
                        {{-- <span class="payment-due__currency">USD</span> --}}
                        <span class="payment-due__price" data-checkout-payment-due-target="93500">
                        {{number_format($total)}}đ
                        </span>
                     </td>
                  </tr>
               </tfoot>
            </table>
            <div class="visually-hidden" aria-live="polite" aria-atomic="true" role="status">
               Updated total price:
               <span data-checkout-payment-due-target="93500">
               $935.00
               </span>
            </div>
        </div>
    </div>
   </div>
</div>

