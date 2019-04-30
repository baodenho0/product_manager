<!DOCTYPE html>
<html lang="en" dir="ltr" class="no-js windows chrome desktop page--no-banner page--logo-main page--show page--show card-fields">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, user-scalable=0">
      <meta name="referrer" content="origin">
      <title>  @yield('title')</title>
      <meta data-browser="chrome" data-browser-major="72" />
      <meta data-body-font-family="-apple-system, BlinkMacSystemFont, &#39;Segoe UI&#39;, Roboto, Helvetica, Arial, sans-serif, &#39;Apple Color Emoji&#39;, &#39;Segoe UI Emoji&#39;, &#39;Segoe UI Symbol&#39;" data-body-font-type="system" />
      <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/25763756/digital_wallets/dialog">
      <meta name="shopify-checkout-authorization-token" content="36544b30f5d19607c65520d3db57ae8f" />
      <!-- <meta id="shopify-regional-checkout-config" name="shopify-regional-checkout-config" content="{&quot;bugsnag&quot;:{&quot;checkoutJSApiKey&quot;:&quot;717bcb19cf4dd1ab6465afcec8a8de02&quot;,&quot;endpoint&quot;:&quot;https:\/\/notify.bugsnag.com&quot;}}" /> -->
      <!-- <meta id="autocomplete-service-sandbox-url" name="autocomplete-service-sandbox-url" content="https://checkout.shopify.com/25763756/sandbox/autocomplete_service?locale=en" /> -->
      <!--[if lt IE 9]>
      <link rel="stylesheet" media="all" href="//cdn.shopify.com/app/services/25763756/assets/32546324522/checkout_stylesheet/v2-ltr-edge-b2ba0c53726960f6205774d4a0a6af40-11/oldie" />
      <![endif]-->
      <!--[if gte IE 9]><!-->
      {{-- 
      <link rel="stylesheet" href="/assets_customer/css/bootstrap.min.css">
      --}}
      <link rel="stylesheet" media="all" href="/assets_customer/css/checkout.css" />
      <!--<![endif]-->
      <script type="text/javascript"></script>
   </head>
   <body>
      <a href="#main-header" class="skip-to-content">
      Skip to content
      </a>
      <div class="banner" data-header>
         <div class="wrap">
            <a class="logo logo--left" href="https://woodmart-default.myshopify.com">
            <span class="logo__text heading-1">
            Woodmart Default
            </span>
            </a>
            <h1 class="visually-hidden">
               Customer information
            </h1>
         </div>
      </div>
      <button class="order-summary-toggle order-summary-toggle--show shown-if-js" data-trekkie-id="order_summary_toggle" aria-expanded="false" aria-controls="order-summary" data-drawer-toggle="[data-order-summary]">
         <span class="wrap">
            <span class="order-summary-toggle__inner">
               <span class="order-summary-toggle__icon-wrapper">
                  <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__icon">
                     <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" />
                  </svg>
               </span>
               <span class="order-summary-toggle__text order-summary-toggle__text--show">
                  <span>Show order summary</span>
                  <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000">
                     <path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z" />
                  </svg>
               </span>
               <span class="order-summary-toggle__text order-summary-toggle__text--hide">
                  <span>Hide order summary</span>
                  <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000">
                     <path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z" />
                  </svg>
               </span>
               <span class="order-summary-toggle__total-recap total-recap" data-order-summary-section="toggle-total-recap">
               <span class="total-recap__final-price" data-checkout-payment-due-target="93500">$935.00</span>
               </span>
            </span>
         </span>
      </button>
      <div class="content" data-content>
         <div class="wrap">

            @yield('content')

            <div class="sidebar" role="complementary">
               <div class="sidebar__header">
                  <a class="logo logo--left" href="https://woodmart-default.myshopify.com">
                  <span class="logo__text heading-1">
                  Woodmart Default
                  </span>
                  </a>
                  <h1 class="visually-hidden">
                     Customer information
                  </h1>
               </div>
               {{--  --}}
               @include('customer.checkout.__sidebar__content')
               {{--  --}}
            </div>
         </div>
      </div>
      <script src="/assets/vendor/jquery/jquery-1.12.3.min.js"></script>
      @yield('customJS')
      <script>
         $(document).ready(function(){
         
            $(document).on('focusout','#phone',function(){
               var phone = $(this).val();
               $.ajax({
                  url:"{{ route('checkphone') }}",
                  method: "get",
                  data:{phone:phone},
                  dataType:"json",
                  success:function(data){                                              
                    $('#email').val(data.email);
                    $('#name').val(data.name);
                    $('#address').val(data.address);
                  }
               })
            });
         });
      </script>
   </body>
</html>