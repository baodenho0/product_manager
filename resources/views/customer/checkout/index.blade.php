@extends('customer.checkout.layout')
@section('title','Checkout')
@section('content')
<div class="main" role="main">
   <div class="main__header">
      <a class="logo logo--left" href="https://woodmart-default.myshopify.com">
      <span class="logo__text heading-1">
      Woodmart Default
      </span>
      </a>
      <h1 class="visually-hidden">
         Customer information
      </h1>
      <div class="shown-if-js" data-alternative-payments></div>
   </div>
   <div class="main__content">
      <div class="step" data-step="contact_information" data-last-step="false">
         {{Session::has('message') ? Session::has('message') : '' }}
         <form action="{{ route('checkout') }}"  method="post">
            {{csrf_field()}}
            <div class="step__sections">
               <div class="section section--contact-information">
                  <div class="section__header">
                     <div class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
                        <h2 class="section__title layout-flex__item layout-flex__item--stretch" id="main-header" tabindex="-1">
                           Thông tin liên hệ
                        </h2>
                        <p class="layout-flex__item">
                           <span aria-hidden="true">Already have an account?</span>
                           <a data-trekkie-id="have_an_account_login_link" href="https://woodmart-default.myshopify.com/account/login?checkout_url=https%3A%2F%2Fwoodmart-default.myshopify.com%2F25763756%2Fcheckouts%2F3f43b052e06c359fef1ec944bb0c34aa%3Fkey%3D36544b30f5d19607c65520d3db57ae8f%26step%3Dcontact_information">
                           <span class="visually-hidden">Already have an account?</span>
                           Log in
                           </a>        
                        </p>
                     </div>
                  </div>
                  <div class="section__content" data-section="customer-information" data-shopify-pay-validate-on-load="false">
                     <div class="fieldset">
                        <div data-shopify-pay-email-flow="false" class="field field--required">
                           <label  class="field__label" for="checkout_email">Số điện thoại</label>
                           <div  class="field__input-wrapper">
                              <input id="phone" placeholder="Số điện thoại" class="field__input {{$errors->has('phone') ? 'field--error' : ''}}" size="30" type="number" name="phone"  />
                           </div>
                        </div>
                     </div>
                     <div class="fieldset">
                        <div data-shopify-pay-email-flow="false" class="field field--required">
                           <label class="field__label" for="checkout_email">Địa chỉ Email</label>
                           <div class="field__input-wrapper">
                              <input id="email" placeholder="Địa chỉ Email" class="field__input {{$errors->has('email') ? 'field--error' : ''}}" size="30" type="text" name="email"  />
                           </div>
                        </div>
                     </div>
                     <div class="field--half field field--required" data-address-field="last_name">
                        <label class="field__label" for="checkout_shipping_address_last_name">Họ tên</label>
                        <div class="field__input-wrapper">
                           <input id="name" placeholder="Họ tên"  class="field__input {{$errors->has('name') ? 'field--error' : ''}}"  size="30" type="text" name="name" />
                        </div>
                     </div>
                     {{-- <div class="fieldset-description" data-buyer-accepts-marketing>
                        <div class="section__content">
                           <div class="checkbox-wrapper">
                              <div class="checkbox__input">
                              </div>
                              <label class="checkbox__label" for="checkout_buyer_accepts_marketing">
                              Keep me up to date on news and exclusive offers
                              </label>
                           </div>
                        </div>
                     </div> --}}
                  </div>
               </div>
               <div class="section section--shipping-address" data-shipping-address
                  data-update-order-summary>
                  <div class="section__header">
                     <h2 class="section__title">
                        Địa chỉ nhận hàng
                     </h2>
                  </div>
                  <div class="section__content">
                     <div class="fieldset" data-address-fields>
                        <div data-address-field="address1" data-autocomplete-field-container="true" class="field field--required">
                           <label class="field__label" for="checkout_shipping_address_address1">Địa chỉ</label>
                           <div class="field__input-wrapper">
                              <input id="address" placeholder="Địa chỉ" class="field__input {{$errors->has('address') ? 'field--error' : ''}}" size="30" type="text" name="address"  />
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="section section--half-spacing-top section--optional">
                  <div class="section__content">
                     <div class="checkbox-wrapper">
                        <div class="checkbox__input">
                           <input size="30" type="hidden"  />
                           <input  type="hidden" value="0" /><input class="input-checkbox" data-backup="remember_me" data-trekkie-id="remember_me_field" type="checkbox" value="1" id="checkout_remember_me" />
                        </div>
                        <label class="checkbox__label" for="checkout_remember_me">
                        Save this information for next time
                        </label>          
                     </div>
                  </div>
               </div>
            </div>
            <div class="step__footer" data-step-footer>
               <button  type="submit" id="continue_button" class="step__footer__continue-btn btn " >
                  <span class="btn__content">
                  Đặt hàng
                  </span>
                  <svg class="icon-svg icon-svg--size-18 btn__spinner icon-svg--spinner-button" aria-hidden="true" focusable="false">
                     <use xlink:href="#spinner-button" />
                  </svg>
               </button>
               <a class="step__footer__previous-link" data-trekkie-id="previous_step_link" href="https://woodmart-default.myshopify.com/cart">
                  <svg focusable="false" aria-hidden="true" class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                     <path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"/>
                  </svg>
                  <span class="step__footer__previous-link-content">Return to cart</span>
               </a>
            </div>
         </form>
      </div>
      <span class="visually-hidden" id="forwarding-external-new-window-message">
      Opens external website in a new window.
      </span>
      <span class="visually-hidden" id="forwarding-new-window-message">
      Opens in a new window.
      </span>
      <span class="visually-hidden" id="forwarding-external-message">
      Opens external website.
      </span>
      <span class="visually-hidden" id="checkout-context-step-one">
      Customer information - Woodmart Default - Checkout
      </span>
   </div>
   <div class="main__footer">
      <div role="contentinfo" aria-label="Footer">
         <p class="copyright-text">
            All rights reserved Woodmart Default
         </p>
      </div>
   </div>
</div>
@endsection