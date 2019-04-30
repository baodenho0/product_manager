@extends('customer.layouts.master')
@section('title','Home')
@section('content')
{{-- content  --}}
<div class="main-page-wrapper">
   <div class="container">
      <div class="row content-layout-wrapper">
         @include('customer.home.__slide')
      </div>
      <div id="shopify-section-1516381267784" class="shopify-section">
         <div class="feature-categories" data-section-id="1516381267784" data-section-type="feature-categories-section">
            <div id="feature-categories-1516381267784">
               <div  class="vc_row wpb_row vc_row-fluid bg-bottom vc_custom_1516381267784  woodmart-disable-overflow" style="margin-top: px; margin-bottom: 15px; padding: ;">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                     <div class="vc_column-inner vc_custom_1496220821354">
                        <div class="wpb_wrapper">
                           <div class="title-wrapper woodmart-title-color-default woodmart-title-style-default woodmart-title-size-medium woodmart-title-width-100 text-center">
                              <div class="title-subtitle font-default style-default"><span class="">123 WOODMART COLLECTIONS</span>
                                 {{-- <span class="lang2">WOODMART COLLECTIONS</span>
                              </div>
                              <div class="liner-continer">
                                 --}}
                                 <span class="left-line"></span>
                                 <h4 class="woodmart-title-container title  woodmart-font-weight-"><span class="lang1">FEATURED CATEGORIES</span>
                                    <span class="lang2">FEATURED CATEGORIES</span>
                                 </h4>
                                 <span class="right-line"></span>
                              </div>
                              <div class="title-after_title"><span class="lang1">WoodMart is a powerful eCommerce theme for Shopify.</span>
                                 <span class="lang2">WoodMart is a powerful eCommerce theme for Shopify.</span>
                              </div>
                           </div>
                           @include('customer.home.__categories')
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="shopify-section-1516422465095" class="shopify-section">
         <div class="product-tab" data-section-id="1516422465095" data-section-type="product-tab-section">
            <div  id="product-tab-1516422465095" class="vc_row wpb_row vc_row-fluid vc_custom_1516422465095 vc_row-has-fill  woodmart-disable-overflow woodmart-bg-left-bottom">
               <div class="wpb_column vc_column_container vc_col-sm-12">
                  <div class="vc_column-inner vc_custom_1505469909236">
                     <div class="wpb_wrapper">
                        <div class="title-wrapper woodmart-title-color-default woodmart-title-style-default woodmart-title-size-medium woodmart-title-width-100 text-center vc_custom_1496223150522">
                           <div class="title-subtitle font-default style-default"><span class="lang1">WOODEN ACCESSORIES</span>
                              <span class="lang2">WOODEN ACCESSORIES</span>
                           </div>
                           <div class="liner-continer">
                              <span class="left-line"></span>
                              <h4 class="woodmart-title-container title  woodmart-font-weight-"><span class="lang1">FEATURED PRODUCTS</span>
                                 <span class="lang2">FEATURED PRODUCTS</span>
                              </h4>
                              <span class="right-line"></span>
                           </div>
                           <div class="title-after_title"><span class="lang1">Visit our shop to see amazing creations from our designers.</span>
                              <span class="lang2">Visit our shop to see amazing creations from our designers.</span>
                           </div>
                           <style></style>
                        </div>
                        <div class="woodmart-products-tabs tabs-1516422465095 tabs-design-default">
                           {{-- 
                           <div class="woodmart-tabs-header">
                              <div class="woodmart-tabs-loader"></div>
                              <div class="tabs-navigation-wrapper">
                                 <span class="open-title-menu"></span>
                                 <ul class="products-tabs-title">
                                    <li class="active-tab-title" data-atts="/collections/furniture?page=1&q=layout_grid+hover_base+columns_4+limit_8+pagination_arrows+space_20&view=ajax_tab"><span class="tab-label"><span class="lang1">FEATURED</span>
                                       <span class="lang2">FEATURED</span></span>
                                    </li>
                                    <li class="" data-atts="/collections/accessories?page=1&q=layout_grid+hover_base+columns_4+limit_8+pagination_arrows+space_20&view=ajax_tab"><span class="tab-label"><span class="lang1">BEST SELLERS</span>
                                       <span class="lang2">BEST SELLERS</span></span>
                                    </li>
                                    <li class="" data-atts="/collections/clocks?page=1&q=layout_grid+hover_base+columns_4+limit_8+pagination_arrows+space_20&view=ajax_tab"><span class="tab-label"><span class="lang1">SALES</span>
                                       <span class="lang2">SALES</span></span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           --}}
                           <div class="woodmart-tab-content">
                              <div class="woodmart-products-element">
                                 <div class="woodmart-products-loader hidden-loader"></div>
                                 <div class="products elements-grid row woodmart-products-holder woodmart-spacing-20 products-spacing-20 grid-columns-4 pagination-arrows" data-paged="1">
                                    {{-- 
                                    <h1>đay la dau? 1</h1>
                                    --}}
                                    {{-- ////////////////////////////////////// FEATURED PRODUCTS --}}
                                    @include('customer.home.__products')
                                    {{-- end FEATURED PRODUCTS- - - - - - - - - - - --}}
                                    <div class="clearfix visible-xs-block"></div>
                                    <div class="clearfix visible-md-block visible-lg-block"></div>
                                 </div>
                                 {{-- 
                                 <div class="products-footer" data-status="have-posts">
                                    <div class="wrap-loading-arrow">
                                       <div class="woodmart-products-load-prev disabled">Load previous products</div>
                                       <div class="woodmart-products-load-next">
                                          <a href="collections/furniture031d.html?page=2&amp;q=layout_grid+hover_base+columns_4+limit_8+pagination_arrows+space_20&amp;view=ajax_tab">Load next products</a>
                                       </div>
                                    </div>
                                 </div>
                                 --}}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            {{-- 
            <style>
               .vc_custom_1516422465095 { 
               border-top-width: 0px !important;background-color: transparent;
               }   
               .vc_custom_1496223150522 {margin-bottom: 15px !important;}.vc_custom_1516422465095{margin-top: px;margin-bottom: 49px;padding:;}
            </style>
            --}}
         </div>
      </div>
      {{-- 
      <h1>đây la đâu?</h1>
      --}}
      <div id="shopify-section-1516899762361" class="shopify-section">
         <div data-section-id="1516899762361" data-section-type="carousel-section">
            <div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid vc_custom_1516899762361 vc_row-has-fill woodmart-bg-center-center  woodmart-bg-left-top" style="margin-top:px; margin-bottom:0px;padding: 53px 0 15px 0;">
               <div class="vc_column-inner vc_col-sm-12">
                  <div class="wpb_wrapper">
                     <div id="slide_1516899762361" class="product-landing-widget landing-color-light slider-product_1516899762361 product-carousel product-hover-alt product-columns-1 product-style-default">
                        <div class="data-carousel" data-auto="5000" data-items="1" data-1200="1" data-992="1" data-768="1" data-480="1" data-320="1" data-paging="true" data-nav="false" data-margin="0" data-prev='' data-loop="true" data-next='' style="display: none;"></div>
                        <div class="product-items-wrapper owl-carousel carousel-init">
                           <div class="product-item">
                              <div class="vc_row wpb_row vc_row-fluid vc_row-has-fill">
                                 <div class="wpb_column vc_col-sm-6 vc_col-lg-6 vc_col-md-6 vc_col-xs-12">
                                    <div class="vc_column-inner">
                                       <div class="wpb_wrapper"><img src="image/chair_630x387102b.png?v=1516908046" alt=""/>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="wpb_column vc_col-sm-6 vc_col-lg-6 vc_col-md-6 vc_col-xs-12">
                                    <div class="vc_column-inner">
                                       <div class="wpb_wrapper">
                                          <div class="title-wrapper woodmart-title-color-white woodmart-title-style-default woodmart-title-size-extra-large2 woodmart-title-width-100 text-left">
                                             <div class="title-subtitle font-default style-default vc_custom_22123233"><span class="lang1">PRODUCT LANDING PAGE</span>
                                                <span class="lang2">PRODUCT LANDING PAGE</span>
                                             </div>
                                             <div class="liner-continer vc_custom_3453452123">
                                                <span class="left-line"></span>
                                                <h4 class="woodmart-title-container title  woodmart-font-weight-"><span class="lang1">Vitra Chair -<br>Classic Design.</span>
                                                   <span class="lang2">Vitra Chair -<br>Classic Design.</span>
                                                </h4>
                                                <span class="right-line"></span>
                                             </div>
                                             <div class="title-after_title">
                                                <div class="vc_row wpb_row vc_row-fluid vc_row-has-fill">
                                                   <div class="wpb_column vc_col-sm-4 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                                      <div class="vc_column-inner">
                                                         <div class="wpb_wrapper">
                                                            <div class="landing-item">
                                                               <div class="lang1">
                                                                  <p>Designer:</p>
                                                                  <p>René Magritte</p>
                                                               </div>
                                                               <div class="lang2">
                                                                  <p>Designer:</p>
                                                                  <p>René Magritte</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="wpb_column vc_col-sm-4 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                                      <div class="vc_column-inner">
                                                         <div class="wpb_wrapper">
                                                            <div class="landing-item">
                                                               <div class="lang1">
                                                                  <p>Materials:</p>
                                                                  <p>Wood</p>
                                                               </div>
                                                               <div class="lang2">
                                                                  <p>Materials:</p>
                                                                  <p>Wood</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="wpb_column vc_col-sm-4 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                                      <div class="vc_column-inner">
                                                         <div class="wpb_wrapper">
                                                            <div class="landing-item">
                                                               <div class="lang1">
                                                                  <p>Client:</p>
                                                                  <p>Woodmart</p>
                                                               </div>
                                                               <div class="lang2">
                                                                  <p>Client:</p>
                                                                  <p>Woodmart</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="landing-price text-left btn-inline" style="display:inline-block;vertical-align:middle;padding-right:25px;">
                                             $1999.00
                                          </div>
                                          <div class="woodmart-button-wrapper text-center btn-inline">
                                             <a href="#" title="" class="btn btn-color-white btn-style-bordered btn-size-large"><span class="lang1">Add To Cart</span>
                                             <span class="lang2">Add To Cart</span></a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="product-item">
                              <div class="vc_row wpb_row vc_row-fluid vc_row-has-fill">
                                 <div class="wpb_column vc_col-sm-6 vc_col-lg-6 vc_col-md-6 vc_col-xs-12">
                                    <div class="vc_column-inner">
                                       <div class="wpb_wrapper"><img src="image/slide-lamps_630x387f5e2.png?v=1516908060" alt=""/>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="wpb_column vc_col-sm-6 vc_col-lg-6 vc_col-md-6 vc_col-xs-12">
                                    <div class="vc_column-inner">
                                       <div class="wpb_wrapper">
                                          <div class="title-wrapper woodmart-title-color-white woodmart-title-style-default woodmart-title-size-extra-large2 woodmart-title-width-100 text-left">
                                             <div class="title-subtitle font-default style-default vc_custom_22123233"><span class="lang1">PRODUCT LANDING PAGE</span>
                                                <span class="lang2">PRODUCT LANDING PAGE</span>
                                             </div>
                                             <div class="liner-continer vc_custom_3453452123">
                                                <span class="left-line"></span>
                                                <h4 class="woodmart-title-container title  woodmart-font-weight-"><span class="lang1">Woodspot -<br>Lamp by Seletti.</span>
                                                   <span class="lang2">Woodspot -<br>Lamp by Seletti.</span>
                                                </h4>
                                                <span class="right-line"></span>
                                             </div>
                                             <div class="title-after_title">
                                                <div class="vc_row wpb_row vc_row-fluid vc_row-has-fill">
                                                   <div class="wpb_column vc_col-sm-4 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                                      <div class="vc_column-inner">
                                                         <div class="wpb_wrapper">
                                                            <div class="landing-item">
                                                               <div class="lang1">
                                                                  <p>Designer:</p>
                                                                  <p>René Magritte</p>
                                                               </div>
                                                               <div class="lang2">
                                                                  <p>Designer:</p>
                                                                  <p>René Magritte</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="wpb_column vc_col-sm-4 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                                      <div class="vc_column-inner">
                                                         <div class="wpb_wrapper">
                                                            <div class="landing-item">
                                                               <div class="lang1">
                                                                  <p>Materials:</p>
                                                                  <p>Wood</p>
                                                               </div>
                                                               <div class="lang2">
                                                                  <p>Materials:</p>
                                                                  <p>Wood</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="wpb_column vc_col-sm-4 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                                      <div class="vc_column-inner">
                                                         <div class="wpb_wrapper">
                                                            <div class="landing-item">
                                                               <div class="lang1">
                                                                  <p>Client:</p>
                                                                  <p>Woodmart</p>
                                                               </div>
                                                               <div class="lang2">
                                                                  <p>Client:</p>
                                                                  <p>Woodmart</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="landing-price text-left btn-inline" style="display:inline-block;vertical-align:middle;padding-right:25px;">
                                             $1999.00
                                          </div>
                                          <div class="woodmart-button-wrapper text-center btn-inline">
                                             <a href="#" title="" class="btn btn-color-white btn-style-bordered btn-size-large"><span class="lang1">Add To Cart</span>
                                             <span class="lang2">Add To Cart</span></a>
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
            <div class="vc_row-full-width vc_clearfix"></div>
            <style>
               .vc_custom_1516899762361 { 
               border-top-width: 0px !important;background-image: url(image/bg_product469c.jpg?v=1516900249) !important;
               background-position: center center !important;
               background-repeat: no-repeat !important;
               background-size: cover !important;
               background-attachment: default !important;background-color: transparent;
               } 
               .vc_custom_22123233 {
               font-family: Lato; 
               font-weight: 700;
               line-height: 16px;
               padding-top: 20px;
               padding-bottom: 2px;
               }
               .vc_custom_3453452123 {
               margin-bottom: 17px !important;
               }
               .landing-item p{
               font-size: 16px;
               line-height: 16px;
               font-weight: 700; 
               font-family: Lato;
               text-transform: uppercase;color: rgb(255, 255, 255);
               border-bottom: solid 1px rgba(255, 255, 255, 0.5);padding-bottom: 11px;
               }
               .landing-item p + p {
               font-weight: 400;color: rgba(255, 255, 255, 0.8);letter-spacing: 0px;
               font-family: lato;
               font-style: italic; 
               text-transform: inherit;
               border:none;
               padding-top: 11px;
               padding-bottom: 0;
               }
            </style>
         </div>
      </div>
      <div id="shopify-section-1516893998775" class="shopify-section">
         <div data-section-id="1516893998775" data-section-type="newsletter-section">
            <div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid mobile-bg-img-hidden vc_custom_1516893998775 vc_row-has-fill woodmart-bg-center-center  woodmart-bg-left-top" style="margin-top:px; margin-bottom:0px;padding: 100px 0 100px 0;">
               <div class="wpb_column vc_column_container vc_col-sm-7 vc_col-lg-6 vc_col-md-6 vc_col-xs-12">
                  <div class="vc_column-inner vc_custom_1497354312965">
                     <div class="wpb_wrapper">
                        <h4 style="font-size: 24px;color: #8e8e8e;text-align: left;font-family:Lato;font-weight:300;font-style:normal" class="vc_custom_heading visible-lg vc_custom_1497354086228"><span class="lang1">ALL-IN-ONE ECOMMERCE SOLUTION</span>
                           <span class="lang2">ALL-IN-ONE ECOMMERCE SOLUTION</span>
                        </h4>
                        <h4 style="font-size: 30px;text-align: left" class="vc_custom_heading vc_custom_1496392459873"><span class="lang1">ABOUT OUR WOODMART STORE</span>
                           <span class="lang2">ABOUT OUR WOODMART STORE</span>
                        </h4>
                        <div class="wpb_text_column wpb_content_element  vc_custom_1496412868095 text-larger">
                           <div class="wpb_wrapper">
                              <div class="lang1">
                                 <p style="text-align: left;">Nec  adipiscing luctus consequat penatibus parturient massa cubilia etiam a adipiscing enigm dignissim congue egestas sapien a. Scelerisque ac non ut ac bibendum himenaeos ullamcorper justo himenaeos vel a sapien quis.</p>
                              </div>
                              <div class="lang2">
                                 <p style="text-align: left;">Nec  adipiscing luctus consequat penatibus parturient massa cubilia etiam a adipiscing enigm dignissim congue egestas sapien a. Scelerisque ac non ut ac bibendum himenaeos ullamcorper justo himenaeos vel a sapien quis.</p>
                              </div>
                           </div>
                        </div>
                        <div class="woodmart-button-wrapper text-center btn-inline">
                           <a href="#" title="" class="btn btn-color-primary btn-style-default btn-size-default"><span class="lang1">Read More</span>
                           <span class="lang2">Read More</span></a>
                        </div>
                        <div class="woodmart-button-wrapper text-center btn-inline">
                           <a href="#" title="" class="btn btn-color-default btn-style-bordered btn-size-default"><span class="lang1">Contact Us</span>
                           <span class="lang2">Contact Us</span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="vc_row-full-width vc_clearfix"></div>
            <style>
               .vc_custom_1516893998775 { 
               border-top-width: 0px !important;background-image: url(image/about-us2-22b3e.jpg?v=1516894134) !important;
               background-position: center center !important;
               background-repeat: no-repeat !important;
               background-size: cover !important;
               background-attachment: default !important;background-color: transparent;
               }
               .vc_custom_1497354312965 {
               padding-top: 0px !important;
               padding-right: 5% !important;
               }
               .vc_custom_1496392459873 {
               margin-bottom: 15px !important;
               }
               .vc_custom_1496412868095 {
               margin-bottom: 30px !important;
               }
               .vc_custom_1497354086228 {
               margin-bottom: 5px !important;
               }
            </style>
         </div>
      </div>
      <div id="shopify-section-1516826681965" class="shopify-section">
         <div data-section-id="1516826681965" data-section-type="newsletter-section">
            <div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid mobile-bg-img-hidden vc_custom_1516826681965 vc_row-has-fill  woodmart-bg-left-top" style="margin-top:px; margin-bottom:50px;padding: 45px 0px 45px 0px;">
               <div class="wpb_column vc_column_container vc_col-sm-12">
                  <div class="vc_column-inner vc_custom_1496402347651">
                     <div class="wpb_wrapper">
                        <div class="title-wrapper  woodmart-title-color-default woodmart-title-style-default woodmart-title-size-default woodmart-title-width-100 text-center vc_custom_1496394323731">
                           <div class="liner-continer">
                              <span class="left-line"></span>
                              <h4 class="woodmart-title-container title  woodmart-font-weight-"><span class="lang1">JOIN OUR NEWSLETTER NOW</span>
                                 <span class="lang2">JOIN OUR NEWSLETTER NOW</span>
                              </h4>
                              <span class="right-line"></span>
                           </div>
                        </div>
                        <div class="wpb_text_column wpb_content_element  vc_custom_1481108949110">
                           <div class="wpb_wrapper">
                              <form action="http://icotheme.us11.list-manage.com/subscribe/post?u=839a8516827cd03ef09d2233b&amp;id=89adf86d59" method="post" target="_blank" name="mc-embedded-subscribe-form" class="mc4wp-form mc4wp-form-1446 mc4wp-form-submitted mc4wp-form-error">
                                 <div class="mc4wp-form-fields">
                                    <p>                        
                                       <input id="fc-email" type="email" value="" name="EMAIL" class="input-group-field" aria-label="Email Address" placeholder="Email Address">
                                    </p>
                                    <p style="margin-bottom: 20px;"><button type="submit" name="subscribe" data-translate="general.newsletter_form.subscribe">subscribe</button></p>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="wpb_text_column wpb_content_element  vc_custom_1496396722562">
                           <div class="wpb_wrapper">
                              <div class="lang1">
                                 <p style="text-align: center;">Will be used in accordance with our <a href="#"><strong>Privacy Policy</strong></a></p>
                              </div>
                              <div class="lang2">
                                 <p style="text-align: center;">Will be used in accordance with our <a href="#"><strong>Privacy Policy</strong></a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="vc_row-full-width vc_clearfix"></div>
            <style>
               .vc_custom_1516826681965 {
               border-top-width: 1px !important;
               border-bottom-width: 1px !important;background-image: url(image/newsletter-new72c9.jpg?v=1516826733) !important;
               background-position: left top !important;
               background-repeat: no-repeat !important;
               background-size: default !important;
               background-attachment: default !important;background-color: transparent;border-top-color: rgba(129,129,129,0.2) !important;
               border-top-style: solid !important;
               border-bottom-color: rgba(129,129,129,0.2) !important;
               border-bottom-style: solid !important;
               }
               .vc_custom_1496402347651 {
               padding-top: 0px !important;
               }
               .vc_custom_1496394323731 {
               margin-bottom: 20px !important;
               }
               .vc_custom_1481108949110 {
               margin-bottom: 0px !important;
               }
               .vc_custom_1496396722562 {
               margin-bottom: 0px !important;
               }
            </style>
         </div>
      </div>
      <div id="shopify-section-1516592122506" class="shopify-section">
         <div class="blog-posts" data-section-id="1516592122506" data-section-type="carousel-section">
            <div id="blog-posts-1516592122506">
               <div  class="vc_row wpb_row vc_row-fluid vc_custom_1516592122506 " style="margin-top:px; margin-bottom:px; padding: ;">
                  <div class="wpb_column vc_column_container vc_col-sm-12">
                     <div class="vc_column-inner vc_custom_1496404193503">
                        <div class="wpb_wrapper">
                           <div class="title-wrapper woodmart-title-color-default woodmart-title-style-default woodmart-title-size-medium woodmart-title-width-100 text-center vc_custom_1497356866356">
                              <div class="title-subtitle font-default style-default"><span class="lang1">FURNITURE GUIDES</span>
                                 <span class="lang2">FURNITURE GUIDES</span>
                              </div>
                              <div class="liner-continer">
                                 <span class="left-line"></span>
                                 <h4 class="woodmart-title-container title  woodmart-font-weight-"><span class="lang1">OUR LATEST NEWS</span>
                                    <span class="lang2">OUR LATEST NEWS</span>
                                 </h4>
                                 <span class="right-line"></span>
                              </div>
                              <div class="title-after_title"><span class="lang1">Latest trends and inspiration in interior design.</span>
                                 <span class="lang2">Latest trends and inspiration in interior design.</span>
                              </div>
                              <style></style>
                           </div>
                           <div id="slide_1516592122506" class="vc_carousel_container">
                              <div class="data-carousel" data-items="3" data-auto="5000" data-paging="false" data-loop="true" data-320="1" data-414="1" data-768="2" data-992="3" data-1200="3" data-margin="0" data-nav="true" data-prev='' data-next='' style="display: none;"></div>
                              <div class="owl-carousel slider-type-post owl-items-xl-3">
                                 <div class="slide-post owl-carousel-item">
                                    <div class="owl-carousel-item-inner">
                                       <article id="post-4521328682" class="blog-design-masonry blog-post-loop post-slide blog-style-shadow post-4521328682 post type-post status-publish format-standard has-post-thumbnail hentry category-Wooden accessories tag-inspiration">
                                          <div class="article-inner">
                                             <header class="entry-header">
                                                <figure id="carousel-4521328682" class="entry-thumbnail">
                                                   <div class="post-img-wrapp">
                                                      <a href="blogs/news/yellow-blue-design-concept-by-don-moerson.html"><img src="image/blog-14_388x273_crop_center57ce.jpg?v=1516256741" class="attachment-large wp-post-image attachment-large" alt=""></a>
                                                   </div>
                                                   <div class="post-image-mask"><span></span></div>
                                                </figure>
                                                <div class="post-date woodmart-post-date">
                                                   <span class="post-date-day">18</span>
                                                   <span class="post-date-month">Jan</span>
                                                </div>
                                             </header>
                                             <div class="article-body-container">
                                                <div class="meta-categories-wrapp">
                                                   <div class="meta-post-categories">
                                                      <a href="blogs/news.html" rel="category tag"><span class="lang1">Wooden accessories</span>
                                                      <span class="lang2">Wooden accessories</span></a>
                                                   </div>
                                                </div>
                                                <h3 class="entry-title">
                                                   <a href="blogs/news/yellow-blue-design-concept-by-don-moerson.html" rel="bookmark"><span class="lang1">Yellow/blue design concept by Don Moerson</span>
                                                   <span class="lang2">Yellow/blue design concept by Don Moerson</span></a>
                                                </h3>
                                                <div class="entry-meta woodmart-entry-meta">
                                                   <ul class="entry-meta-list">
                                                      <li class="meta-author">
                                                         <span data-translate="blogs.article.posted_by">Posted by</span>
                                                         <a href="javascrip:void()" rel="author">woo admin</a>
                                                      </li>
                                                      <li>
                                                         <span class="meta-reply"><a href="blogs/news/yellow-blue-design-concept-by-don-moerson/comments.html">
                                                         <span class="comments-count">0</span> 
                                                         <span class="comments-count-label" data-translate="blogs.comments.comments_with_count">blogs.comments.comments_with_count</span>
                                                         </a>
                                                         </span>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="hovered-social-icons">
                                                   <div class="woodmart-social-icons text-center icons-design-default icons-size-small color-scheme-light social-share social-form-circle">
                                                      <div class="woodmart-social-icon social-facebook">
                                                         <a href="../m.facebook.com/loginda39.html?u=https://woodmart-default.myshopify.com/blogs/news/yellow-blue-design-concept-by-don-moerson" target="_blank" class="">
                                                         <i class="fa fa-facebook"></i>
                                                         <span class="woodmart-social-icon-name">Facebook</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-twitter">
                                                         <a href="../twitter.com/intent/tweeta4bf.html?url=https://woodmart-default.myshopify.com/blogs/news/yellow-blue-design-concept-by-don-moerson" target="_blank" class="">
                                                         <i class="fa fa-twitter"></i>
                                                         <span class="woodmart-social-icon-name">Twitter</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-google">
                                                         <a href="../plus.google.com/up/indexcf96.html?url=https://woodmart-default.myshopify.com/blogs/news/yellow-blue-design-concept-by-don-moerson" target="_blank" class="">
                                                         <i class="fa fa-google-plus"></i>
                                                         <span class="woodmart-social-icon-name">Google</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-email">
                                                         <a href="mailto:?subject=Check this https://woodmart-default.myshopify.com/blogs/news/yellow-blue-design-concept-by-don-moerson" target="_blank" class="">
                                                         <i class="fa fa-envelope"></i>
                                                         <span class="woodmart-social-icon-name">Email</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-pinterest">
                                                         <a href="../pinterest.com/pin/create/button/index0426.html?url=https://woodmart-default.myshopify.com/blogs/news/yellow-blue-design-concept-by-don-moerson&amp;//cdn.shopify.com/s/files/1/2576/3756/articles/blog-14_1024x460.jpg?v=1516256741" target="_blank" class="">
                                                         <i class="fa fa-pinterest"></i>
                                                         <span class="woodmart-social-icon-name">Pinterest</span>
                                                         </a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="entry-content woodmart-entry-content">
                                                   <span class="lang1">Vivamus enim sagittis aptent hac mi dui a per aptent suspendisse cras odio bibendum augue rhoncus laoreet dui praesent sodales...</span>
                                                   <span class="lang2">Vivamus enim sagittis aptent hac mi dui a per aptent suspendisse cras odio bibendum augue rhoncus laoreet dui praesent sodales...</span>
                                                   <p class="read-more-section">
                                                      <a class="btn-read-more more-link" href="blogs/news/yellow-blue-design-concept-by-don-moerson.html" data-translate="blogs.article.read_more">Continue reading</a>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                       </article>
                                    </div>
                                 </div>
                                 <div class="slide-post owl-carousel-item">
                                    <div class="owl-carousel-item-inner">
                                       <article id="post-4521263146" class="blog-design-masonry blog-post-loop post-slide blog-style-shadow post-4521263146 post type-post status-publish format-standard has-post-thumbnail hentry category-Wooden accessories tag-inspiration">
                                          <div class="article-inner">
                                             <header class="entry-header">
                                                <figure id="carousel-4521263146" class="entry-thumbnail">
                                                   <div class="post-img-wrapp">
                                                      <a href="blogs/news/modular-seating-and-table-system.html"><img src="image/blog-17_76435ddd-e60f-4698-ab59-c48cd036292e_388x273_crop_centerc12a.jpg?v=1516256701" class="attachment-large wp-post-image attachment-large" alt=""></a>
                                                   </div>
                                                   <div class="post-image-mask"><span></span></div>
                                                </figure>
                                                <div class="post-date woodmart-post-date">
                                                   <span class="post-date-day">18</span>
                                                   <span class="post-date-month">Jan</span>
                                                </div>
                                             </header>
                                             <div class="article-body-container">
                                                <div class="meta-categories-wrapp">
                                                   <div class="meta-post-categories">
                                                      <a href="blogs/news.html" rel="category tag"><span class="lang1">Wooden accessories</span>
                                                      <span class="lang2">Wooden accessories</span></a>
                                                   </div>
                                                </div>
                                                <h3 class="entry-title">
                                                   <a href="blogs/news/modular-seating-and-table-system.html" rel="bookmark"><span class="lang1">Modular seating and table system</span>
                                                   <span class="lang2">Modular seating and table system</span></a>
                                                </h3>
                                                <div class="entry-meta woodmart-entry-meta">
                                                   <ul class="entry-meta-list">
                                                      <li class="meta-author">
                                                         <span data-translate="blogs.article.posted_by">Posted by</span>
                                                         <a href="javascrip:void()" rel="author">woo admin</a>
                                                      </li>
                                                      <li>
                                                         <span class="meta-reply"><a href="blogs/news/modular-seating-and-table-system/comments.html">
                                                         <span class="comments-count">0</span> 
                                                         <span class="comments-count-label" data-translate="blogs.comments.comments_with_count">blogs.comments.comments_with_count</span>
                                                         </a>
                                                         </span>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="hovered-social-icons">
                                                   <div class="woodmart-social-icons text-center icons-design-default icons-size-small color-scheme-light social-share social-form-circle">
                                                      <div class="woodmart-social-icon social-facebook">
                                                         <a href="../m.facebook.com/login21dc.html?u=https://woodmart-default.myshopify.com/blogs/news/modular-seating-and-table-system" target="_blank" class="">
                                                         <i class="fa fa-facebook"></i>
                                                         <span class="woodmart-social-icon-name">Facebook</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-twitter">
                                                         <a href="../twitter.com/intent/tweetda1b.html?url=https://woodmart-default.myshopify.com/blogs/news/modular-seating-and-table-system" target="_blank" class="">
                                                         <i class="fa fa-twitter"></i>
                                                         <span class="woodmart-social-icon-name">Twitter</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-google">
                                                         <a href="../plus.google.com/up/index6e7d.html?url=https://woodmart-default.myshopify.com/blogs/news/modular-seating-and-table-system" target="_blank" class="">
                                                         <i class="fa fa-google-plus"></i>
                                                         <span class="woodmart-social-icon-name">Google</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-email">
                                                         <a href="mailto:?subject=Check this https://woodmart-default.myshopify.com/blogs/news/modular-seating-and-table-system" target="_blank" class="">
                                                         <i class="fa fa-envelope"></i>
                                                         <span class="woodmart-social-icon-name">Email</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-pinterest">
                                                         <a href="../pinterest.com/pin/create/button/indexb932.html?url=https://woodmart-default.myshopify.com/blogs/news/modular-seating-and-table-system&amp;//cdn.shopify.com/s/files/1/2576/3756/articles/blog-17_76435ddd-e60f-4698-ab59-c48cd036292e_1024x460.jpg?v=1516256701" target="_blank" class="">
                                                         <i class="fa fa-pinterest"></i>
                                                         <span class="woodmart-social-icon-name">Pinterest</span>
                                                         </a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="entry-content woodmart-entry-content">
                                                   <span class="lang1">Vivamus enim sagittis aptent hac mi dui a per aptent suspendisse cras odio bibendum augue rhoncus laoreet dui praesent sodales...</span>
                                                   <span class="lang2">Vivamus enim sagittis aptent hac mi dui a per aptent suspendisse cras odio bibendum augue rhoncus laoreet dui praesent sodales...</span>
                                                   <p class="read-more-section">
                                                      <a class="btn-read-more more-link" href="blogs/news/modular-seating-and-table-system.html" data-translate="blogs.article.read_more">Continue reading</a>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                       </article>
                                    </div>
                                 </div>
                                 <div class="slide-post owl-carousel-item">
                                    <div class="owl-carousel-item-inner">
                                       <article id="post-4521164842" class="blog-design-masonry blog-post-loop post-slide blog-style-shadow post-4521164842 post type-post status-publish format-standard has-post-thumbnail hentry category-Wooden accessories tag-inspiration">
                                          <div class="article-inner">
                                             <header class="entry-header">
                                                <figure id="carousel-4521164842" class="entry-thumbnail">
                                                   <div class="post-img-wrapp">
                                                      <a href="blogs/news/5-design-trends-in-furniture-this-season.html"><img src="image/blog-15_388x273_crop_centerea0e.jpg?v=1516256640" class="attachment-large wp-post-image attachment-large" alt=""></a>
                                                   </div>
                                                   <div class="post-image-mask"><span></span></div>
                                                </figure>
                                                <div class="post-date woodmart-post-date">
                                                   <span class="post-date-day">18</span>
                                                   <span class="post-date-month">Jan</span>
                                                </div>
                                             </header>
                                             <div class="article-body-container">
                                                <div class="meta-categories-wrapp">
                                                   <div class="meta-post-categories">
                                                      <a href="blogs/news.html" rel="category tag"><span class="lang1">Wooden accessories</span>
                                                      <span class="lang2">Wooden accessories</span></a>
                                                   </div>
                                                </div>
                                                <h3 class="entry-title">
                                                   <a href="blogs/news/5-design-trends-in-furniture-this-season.html" rel="bookmark"><span class="lang1">5 design trends in furniture this season</span>
                                                   <span class="lang2">5 design trends in furniture this season</span></a>
                                                </h3>
                                                <div class="entry-meta woodmart-entry-meta">
                                                   <ul class="entry-meta-list">
                                                      <li class="meta-author">
                                                         <span data-translate="blogs.article.posted_by">Posted by</span>
                                                         <a href="javascrip:void()" rel="author">woo admin</a>
                                                      </li>
                                                      <li>
                                                         <span class="meta-reply"><a href="blogs/news/5-design-trends-in-furniture-this-season/comments.html">
                                                         <span class="comments-count">0</span> 
                                                         <span class="comments-count-label" data-translate="blogs.comments.comments_with_count">blogs.comments.comments_with_count</span>
                                                         </a>
                                                         </span>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="hovered-social-icons">
                                                   <div class="woodmart-social-icons text-center icons-design-default icons-size-small color-scheme-light social-share social-form-circle">
                                                      <div class="woodmart-social-icon social-facebook">
                                                         <a href="../m.facebook.com/login6313.html?u=https://woodmart-default.myshopify.com/blogs/news/5-design-trends-in-furniture-this-season" target="_blank" class="">
                                                         <i class="fa fa-facebook"></i>
                                                         <span class="woodmart-social-icon-name">Facebook</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-twitter">
                                                         <a href="../twitter.com/intent/tweetc0df.html?url=https://woodmart-default.myshopify.com/blogs/news/5-design-trends-in-furniture-this-season" target="_blank" class="">
                                                         <i class="fa fa-twitter"></i>
                                                         <span class="woodmart-social-icon-name">Twitter</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-google">
                                                         <a href="../plus.google.com/up/index958d.html?url=https://woodmart-default.myshopify.com/blogs/news/5-design-trends-in-furniture-this-season" target="_blank" class="">
                                                         <i class="fa fa-google-plus"></i>
                                                         <span class="woodmart-social-icon-name">Google</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-email">
                                                         <a href="mailto:?subject=Check this https://woodmart-default.myshopify.com/blogs/news/5-design-trends-in-furniture-this-season" target="_blank" class="">
                                                         <i class="fa fa-envelope"></i>
                                                         <span class="woodmart-social-icon-name">Email</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-pinterest">
                                                         <a href="../pinterest.com/pin/create/button/indexc5cd.html?url=https://woodmart-default.myshopify.com/blogs/news/5-design-trends-in-furniture-this-season&amp;//cdn.shopify.com/s/files/1/2576/3756/articles/blog-15_1024x460.jpg?v=1516256640" target="_blank" class="">
                                                         <i class="fa fa-pinterest"></i>
                                                         <span class="woodmart-social-icon-name">Pinterest</span>
                                                         </a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="entry-content woodmart-entry-content">
                                                   <span class="lang1">Ullamcorper condimentum erat pretium velit at ut a nunc id a adeu vestibulum nibh urna nam consequat erat molestie lacinia...</span>
                                                   <span class="lang2">Ullamcorper condimentum erat pretium velit at ut a nunc id a adeu vestibulum nibh urna nam consequat erat molestie lacinia...</span>
                                                   <p class="read-more-section">
                                                      <a class="btn-read-more more-link" href="blogs/news/5-design-trends-in-furniture-this-season.html" data-translate="blogs.article.read_more">Continue reading</a>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                       </article>
                                    </div>
                                 </div>
                                 <div class="slide-post owl-carousel-item">
                                    <div class="owl-carousel-item-inner">
                                       <article id="post-4521132074" class="blog-design-masonry blog-post-loop post-slide blog-style-shadow post-4521132074 post type-post status-publish format-standard has-post-thumbnail hentry category-Wooden accessories tag-inspiration">
                                          <div class="article-inner">
                                             <header class="entry-header">
                                                <figure id="carousel-4521132074" class="entry-thumbnail">
                                                   <div class="post-img-wrapp">
                                                      <a href="blogs/news/a-light-filled-loft-in-new-york-city.html"><img src="image/blog-6_388x273_crop_center365b.jpg?v=1516256593" class="attachment-large wp-post-image attachment-large" alt=""></a>
                                                   </div>
                                                   <div class="post-image-mask"><span></span></div>
                                                </figure>
                                                <div class="post-date woodmart-post-date">
                                                   <span class="post-date-day">18</span>
                                                   <span class="post-date-month">Jan</span>
                                                </div>
                                             </header>
                                             <div class="article-body-container">
                                                <div class="meta-categories-wrapp">
                                                   <div class="meta-post-categories">
                                                      <a href="blogs/news.html" rel="category tag"><span class="lang1">Wooden accessories</span>
                                                      <span class="lang2">Wooden accessories</span></a>
                                                   </div>
                                                </div>
                                                <h3 class="entry-title">
                                                   <a href="blogs/news/a-light-filled-loft-in-new-york-city.html" rel="bookmark"><span class="lang1">A light-filled loft in New York city</span>
                                                   <span class="lang2">A light-filled loft in New York city</span></a>
                                                </h3>
                                                <div class="entry-meta woodmart-entry-meta">
                                                   <ul class="entry-meta-list">
                                                      <li class="meta-author">
                                                         <span data-translate="blogs.article.posted_by">Posted by</span>
                                                         <a href="javascrip:void()" rel="author">woo admin</a>
                                                      </li>
                                                      <li>
                                                         <span class="meta-reply"><a href="blogs/news/a-light-filled-loft-in-new-york-city%23comments.html">
                                                         <span class="comments-count">0</span> 
                                                         <span class="comments-count-label" data-translate="blogs.comments.comments_with_count">blogs.comments.comments_with_count</span>
                                                         </a>
                                                         </span>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="hovered-social-icons">
                                                   <div class="woodmart-social-icons text-center icons-design-default icons-size-small color-scheme-light social-share social-form-circle">
                                                      <div class="woodmart-social-icon social-facebook">
                                                         <a href="../m.facebook.com/loginaa55.html?u=https://woodmart-default.myshopify.com/blogs/news/a-light-filled-loft-in-new-york-city" target="_blank" class="">
                                                         <i class="fa fa-facebook"></i>
                                                         <span class="woodmart-social-icon-name">Facebook</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-twitter">
                                                         <a href="../twitter.com/intent/tweet2eee.html?url=https://woodmart-default.myshopify.com/blogs/news/a-light-filled-loft-in-new-york-city" target="_blank" class="">
                                                         <i class="fa fa-twitter"></i>
                                                         <span class="woodmart-social-icon-name">Twitter</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-google">
                                                         <a href="../plus.google.com/up/index1ab1.html?url=https://woodmart-default.myshopify.com/blogs/news/a-light-filled-loft-in-new-york-city" target="_blank" class="">
                                                         <i class="fa fa-google-plus"></i>
                                                         <span class="woodmart-social-icon-name">Google</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-email">
                                                         <a href="mailto:?subject=Check this https://woodmart-default.myshopify.com/blogs/news/a-light-filled-loft-in-new-york-city" target="_blank" class="">
                                                         <i class="fa fa-envelope"></i>
                                                         <span class="woodmart-social-icon-name">Email</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-pinterest">
                                                         <a href="../pinterest.com/pin/create/button/index99d8.html?url=https://woodmart-default.myshopify.com/blogs/news/a-light-filled-loft-in-new-york-city&amp;//cdn.shopify.com/s/files/1/2576/3756/articles/blog-6_1024x460.jpg?v=1516256593" target="_blank" class="">
                                                         <i class="fa fa-pinterest"></i>
                                                         <span class="woodmart-social-icon-name">Pinterest</span>
                                                         </a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="entry-content woodmart-entry-content">
                                                   <span class="lang1">Parturient in potenti id rutrum duis torquent parturient sceler isque sit vestibulum a posuere scelerisque viverra urna. Egestas tristique vestibulum vestibulum...</span>
                                                   <span class="lang2">Parturient in potenti id rutrum duis torquent parturient sceler isque sit vestibulum a posuere scelerisque viverra urna. Egestas tristique vestibulum vestibulum...</span>
                                                   <p class="read-more-section">
                                                      <a class="btn-read-more more-link" href="blogs/news/a-light-filled-loft-in-new-york-city.html" data-translate="blogs.article.read_more">Continue reading</a>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                       </article>
                                    </div>
                                 </div>
                                 <div class="slide-post owl-carousel-item">
                                    <div class="owl-carousel-item-inner">
                                       <article id="post-4521099306" class="blog-design-masonry blog-post-loop post-slide blog-style-shadow post-4521099306 post type-post status-publish format-standard has-post-thumbnail hentry category-Wooden accessories tag-inspiration">
                                          <div class="article-inner">
                                             <header class="entry-header">
                                                <figure id="carousel-4521099306" class="entry-thumbnail">
                                                   <div class="post-img-wrapp">
                                                      <a href="blogs/news/woodmart-opens-a-concept-store-highlightings.html"><img src="../cdn.shopify.com/s/files/1/2576/3756/articles/blog-3_388x273_crop_center7b1b.jpg?v=1516256520" class="attachment-large wp-post-image attachment-large" alt=""></a>
                                                   </div>
                                                   <div class="post-image-mask"><span></span></div>
                                                </figure>
                                                <div class="post-date woodmart-post-date">
                                                   <span class="post-date-day">18</span>
                                                   <span class="post-date-month">Jan</span>
                                                </div>
                                             </header>
                                             <div class="article-body-container">
                                                <div class="meta-categories-wrapp">
                                                   <div class="meta-post-categories">
                                                      <a href="blogs/news.html" rel="category tag"><span class="lang1">Wooden accessories</span>
                                                      <span class="lang2">Wooden accessories</span></a>
                                                   </div>
                                                </div>
                                                <h3 class="entry-title">
                                                   <a href="blogs/news/woodmart-opens-a-concept-store-highlightings.html" rel="bookmark"><span class="lang1">Woodmart opens a concept store highlightings</span>
                                                   <span class="lang2">Woodmart opens a concept store highlightings</span></a>
                                                </h3>
                                                <div class="entry-meta woodmart-entry-meta">
                                                   <ul class="entry-meta-list">
                                                      <li class="meta-author">
                                                         <span data-translate="blogs.article.posted_by">Posted by</span>
                                                         <a href="javascrip:void()" rel="author">woo admin</a>
                                                      </li>
                                                      <li>
                                                         <span class="meta-reply"><a href="blogs/news/woodmart-opens-a-concept-store-highlightings%23comments.html">
                                                         <span class="comments-count">0</span> 
                                                         <span class="comments-count-label" data-translate="blogs.comments.comments_with_count">blogs.comments.comments_with_count</span>
                                                         </a>
                                                         </span>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="hovered-social-icons">
                                                   <div class="woodmart-social-icons text-center icons-design-default icons-size-small color-scheme-light social-share social-form-circle">
                                                      <div class="woodmart-social-icon social-facebook">
                                                         <a href="../m.facebook.com/login0023.html?u=https://woodmart-default.myshopify.com/blogs/news/woodmart-opens-a-concept-store-highlightings" target="_blank" class="">
                                                         <i class="fa fa-facebook"></i>
                                                         <span class="woodmart-social-icon-name">Facebook</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-twitter">
                                                         <a href="../twitter.com/intent/tweet13e0.html?url=https://woodmart-default.myshopify.com/blogs/news/woodmart-opens-a-concept-store-highlightings" target="_blank" class="">
                                                         <i class="fa fa-twitter"></i>
                                                         <span class="woodmart-social-icon-name">Twitter</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-google">
                                                         <a href="../plus.google.com/up/indexa29d.html?url=https://woodmart-default.myshopify.com/blogs/news/woodmart-opens-a-concept-store-highlightings" target="_blank" class="">
                                                         <i class="fa fa-google-plus"></i>
                                                         <span class="woodmart-social-icon-name">Google</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-email">
                                                         <a href="mailto:?subject=Check this https://woodmart-default.myshopify.com/blogs/news/woodmart-opens-a-concept-store-highlightings" target="_blank" class="">
                                                         <i class="fa fa-envelope"></i>
                                                         <span class="woodmart-social-icon-name">Email</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-pinterest">
                                                         <a href="../pinterest.com/pin/create/button/index15a9.html?url=https://woodmart-default.myshopify.com/blogs/news/woodmart-opens-a-concept-store-highlightings&amp;//cdn.shopify.com/s/files/1/2576/3756/articles/blog-3_1024x460.jpg?v=1516256520" target="_blank" class="">
                                                         <i class="fa fa-pinterest"></i>
                                                         <span class="woodmart-social-icon-name">Pinterest</span>
                                                         </a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="entry-content woodmart-entry-content">
                                                   <span class="lang1">Ac haca ullamcorper donec ante habi tasse donec imperdiet eturpis varius per a augue magna hac. Nec hac et vestibulum...</span>
                                                   <span class="lang2">Ac haca ullamcorper donec ante habi tasse donec imperdiet eturpis varius per a augue magna hac. Nec hac et vestibulum...</span>
                                                   <p class="read-more-section">
                                                      <a class="btn-read-more more-link" href="blogs/news/woodmart-opens-a-concept-store-highlightings.html" data-translate="blogs.article.read_more">Continue reading</a>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                       </article>
                                    </div>
                                 </div>
                                 <div class="slide-post owl-carousel-item">
                                    <div class="owl-carousel-item-inner">
                                       <article id="post-4521066538" class="blog-design-masonry blog-post-loop post-slide blog-style-shadow post-4521066538 post type-post status-publish format-standard has-post-thumbnail hentry category-Wooden accessories tag-inspiration">
                                          <div class="article-inner">
                                             <header class="entry-header">
                                                <figure id="carousel-4521066538" class="entry-thumbnail">
                                                   <div class="post-img-wrapp">
                                                      <a href="blogs/news/light-seats-made-from-woodmart-factory.html"><img src="../cdn.shopify.com/s/files/1/2576/3756/articles/blog-2_388x273_crop_center4452.jpg?v=1516256477" class="attachment-large wp-post-image attachment-large" alt=""></a>
                                                   </div>
                                                   <div class="post-image-mask"><span></span></div>
                                                </figure>
                                                <div class="post-date woodmart-post-date">
                                                   <span class="post-date-day">18</span>
                                                   <span class="post-date-month">Jan</span>
                                                </div>
                                             </header>
                                             <div class="article-body-container">
                                                <div class="meta-categories-wrapp">
                                                   <div class="meta-post-categories">
                                                      <a href="blogs/news.html" rel="category tag"><span class="lang1">Wooden accessories</span>
                                                      <span class="lang2">Wooden accessories</span></a>
                                                   </div>
                                                </div>
                                                <h3 class="entry-title">
                                                   <a href="blogs/news/light-seats-made-from-woodmart-factory.html" rel="bookmark"><span class="lang1">Light seats made from Woodmart factory</span>
                                                   <span class="lang2">Light seats made from Woodmart factory</span></a>
                                                </h3>
                                                <div class="entry-meta woodmart-entry-meta">
                                                   <ul class="entry-meta-list">
                                                      <li class="meta-author">
                                                         <span data-translate="blogs.article.posted_by">Posted by</span>
                                                         <a href="javascrip:void()" rel="author">woo admin</a>
                                                      </li>
                                                      <li>
                                                         <span class="meta-reply"><a href="blogs/news/light-seats-made-from-woodmart-factory%23comments.html">
                                                         <span class="comments-count">0</span> 
                                                         <span class="comments-count-label" data-translate="blogs.comments.comments_with_count">blogs.comments.comments_with_count</span>
                                                         </a>
                                                         </span>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="hovered-social-icons">
                                                   <div class="woodmart-social-icons text-center icons-design-default icons-size-small color-scheme-light social-share social-form-circle">
                                                      <div class="woodmart-social-icon social-facebook">
                                                         <a href="../m.facebook.com/login5b58.html?u=https://woodmart-default.myshopify.com/blogs/news/light-seats-made-from-woodmart-factory" target="_blank" class="">
                                                         <i class="fa fa-facebook"></i>
                                                         <span class="woodmart-social-icon-name">Facebook</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-twitter">
                                                         <a href="../twitter.com/intent/tweetc7ab.html?url=https://woodmart-default.myshopify.com/blogs/news/light-seats-made-from-woodmart-factory" target="_blank" class="">
                                                         <i class="fa fa-twitter"></i>
                                                         <span class="woodmart-social-icon-name">Twitter</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-google">
                                                         <a href="../plus.google.com/up/indexe093.html?url=https://woodmart-default.myshopify.com/blogs/news/light-seats-made-from-woodmart-factory" target="_blank" class="">
                                                         <i class="fa fa-google-plus"></i>
                                                         <span class="woodmart-social-icon-name">Google</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-email">
                                                         <a href="mailto:?subject=Check this https://woodmart-default.myshopify.com/blogs/news/light-seats-made-from-woodmart-factory" target="_blank" class="">
                                                         <i class="fa fa-envelope"></i>
                                                         <span class="woodmart-social-icon-name">Email</span>
                                                         </a>
                                                      </div>
                                                      <div class="woodmart-social-icon social-pinterest">
                                                         <a href="../pinterest.com/pin/create/button/indexb279.html?url=https://woodmart-default.myshopify.com/blogs/news/light-seats-made-from-woodmart-factory&amp;//cdn.shopify.com/s/files/1/2576/3756/articles/blog-2_1024x460.jpg?v=1516256477" target="_blank" class="">
                                                         <i class="fa fa-pinterest"></i>
                                                         <span class="woodmart-social-icon-name">Pinterest</span>
                                                         </a>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="entry-content woodmart-entry-content">
                                                   <span class="lang1">Aliquet parturient scele risque scele risque nibh pretium parturient suspendisse platea sapien torquent feugiat parturient hac amet. Volutpat nullam montes mollis...</span>
                                                   <span class="lang2">Aliquet parturient scele risque scele risque nibh pretium parturient suspendisse platea sapien torquent feugiat parturient hac amet. Volutpat nullam montes mollis...</span>
                                                   <p class="read-more-section">
                                                      <a class="btn-read-more more-link" href="blogs/news/light-seats-made-from-woodmart-factory.html" data-translate="blogs.article.read_more">Continue reading</a>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                       </article>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <style>
                  .vc_custom_1516592122506 {  
                  border-top-width: 0px !important;background-color: transparent;
                  }  
               </style>
            </div>
         </div>
      </div>
      <!-- END content_for_index -->
   </div>
</div>
</div>
</div> 
{{-- end content --}}
@endsection