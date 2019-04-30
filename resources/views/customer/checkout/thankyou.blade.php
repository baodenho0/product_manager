@extends('customer.checkout.layout')
@section('title','Thank you')
@section('content')
<div class="main" role="main">
   <div class="main__header">
      <a class="logo logo--left" href="https://woodmart-default.myshopify.com">
      <span class="logo__text heading-1">
      Woodmart Default
      </span>
      </a>
      <h1 class="visually-hidden">
         Thank you for your purchase!
      </h1>
      <div class="shown-if-js" data-alternative-payments=""></div>
   </div>
   <div class="main__content">
      
      <div class="section">
         <div class="section__header os-header">
            <svg class="icon-svg icon-svg--color-accent icon-svg--size-48 os-header__hanging-icon os-header__hanging-icon--animate" aria-hidden="true" focusable="false">
               <use xlink:href="#checkmark"></use>
            </svg>
            <div class="os-header__heading">
               <span class="os-order-number">
               {{-- Order #{{$client->id}} --}}
               </span>
               <h2 class="os-header__title" id="main-header" tabindex="-1">
                  Thank you {{$client->name}}!
               </h2>
            </div>
         </div>
      </div>
      <div class="section">
         <div class="section__content">
            <div class="content-box">
               <div class="content-box__row">
                  <h2 class="os-step__title" id="main-header" tabindex="-1">Đặt hàng thành công</h2>
                  <p class="os-step__description">
                     {{-- You’ll receive a confirmation email with your order number shortly. --}}
                  </p>
               </div>
            </div>
           
            <div class="content-box">
               <div class="content-box__row content-box__row--no-border">
                  <h2>Customer information</h2>
               </div>
               <div class="content-box__row">
                  <div class="section__content">
                     <div class="section__content__column section__content__column--half">
                        <h3>Thông tin liên hệ</h3>
                        <p>Email: {{$client->email}}</p>
                        <p>SĐT: {{$client->phone}}</p>
                        {{-- <h3>Shipping address</h3>
                        <address class="address">hieu 213123<br>ktx a<br>ktx b<br>hcm 70000<br>Vietnam</address> --}}
                        {{-- <h3>Địa chỉ nhận hàng</h3>
                        <p>Standard Shipping</p> --}}
                     </div>
                     <div class="section__content__column section__content__column--half">
                        {{-- <h3>Payment method</h3>
                        <ul class="payment-method-list">
                           <li class="payment-method-list__item">
                              <span class="payment-method-list__item__info">Money Order</span>
                           </li>
                        </ul> --}}
                        <h3>Địa chỉ nhận hàng</h3>
                        <address class="address">{{$client->address}}</address>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="step__footer">
         <a href="/" class="step__footer__continue-btn btn">
            <span class="btn__content">Continue shopping</span>
            <svg class="icon-svg icon-svg--size-18 btn__spinner icon-svg--spinner-button" aria-hidden="true" focusable="false">
               <use xlink:href="#spinner-button"></use>
            </svg>
         </a>
         <p class="step__footer__info">
            <svg aria-hidden="true" focusable="false" class="icon-svg icon-svg--color-adaptive-lighter icon-svg--size-18 icon-svg--inline-before">
               <use xlink:href="#question-circle"></use>
            </svg>
            <span>
            Need help? <a href="mailto:icothemes@gmail.com">Contact us</a>
            </span>
         </p>
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

@section('customJS')
<script>
	$(document).ready(function(){
		$.ajax({
			url:"{{ route('destroy_cart') }}",
			method:"get",
			success:function(data){
				alert('Đặt hàng thành công');
			}
		})
	});
</script>
@endsection