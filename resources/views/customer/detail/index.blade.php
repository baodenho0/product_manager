@extends('customer.layouts.master') 
@section('title','Detail') 
@section('customCSS')
<link rel="stylesheet" href="css/paginate.css">
@endsection
@section('content')
<!-- //site-header -->
<div class="main-page-wrapper">
   <div class="container-fluid">
      <div class="row content-layout-wrapper">
         <div class="site-content col-sm-12" role="main">
            <div class="single-breadcrumbs-wrapper">
               <div class="container">
                  <nav class="shopify-breadcrumb">
                     <a class="breadcrumb-link" href="/" title="Back to the frontpage" data-translate="general.breadcrumbs.home">Home</a>
                     <a class="breadcrumb-link " href="/{{str_slug($slug_name)}}">
                     <span class="">{{$slug_name}}</span>
                     {{-- <span class="lang2">Furniture</span> --}}
                     </a>
                     <span class="breadcrumb-last"> 
                     <span class="">{{$detail->name}}</span>
                     {{-- <span class="lang2">Grand comfort chair</span> --}}
                     </span>
                  </nav>
                 {{--  <div class="woodmart-products-nav">
                     <a href="javascript:SW.page.backHistory()" class="woodmart-back-btn woodmart-css-tooltip woodmart-tltp">
                     <span class="woodmart-tooltip-label" style="margin-left: -62px;" data-translate="products.product.product_toback">Back to products</span>
                     <span data-translate="products.product.product_toback">Back to products</span>
                     </a>
                     <div class="product-btn product-next">
                        <a href="eames-lounge-chair.html"><b data-translate="products.product.product_next">Next product</b><span class="product-btn-icon"></span></a>
                        <div class="wrapper-short">
                           <div class="product-short">
                              <div class="product-short-image">
                                 <a href="eames-lounge-chair.html" class="product-thumb">
                                 <img width="200" height="230" src="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-8_150x180e062.jpg?v=1516095595" class="attachment-shop_thumbnail size-shop_thumbnail" alt="">
                                 </a>
                              </div>
                              <div class="product-short-description">
                                 <a href="eames-lounge-chair.html" class="product-title">
                                 <span class="lang1">Eames lounge chair</span>
                                 <span class="lang2">Eames lounge chair</span>
                                 </a>
                                 <span class="price"><span class="money">$799.00</span></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> --}}
               </div>
            </div>
            <div id="product-790550872106" class="single-product-page single-product-content  product-design-alt tabs-location-standar tabs-type-tabs   product-with-attachments">
               <meta itemprop="name" content="Grand comfort chair">
               <meta itemprop="url" content="../../../products/grand-comfort-chair.html">
               <meta itemprop="image" content="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_1_800xb0c8.jpg?v=1516200417">
               <div class="container">
                  <div class="row product-image-summary-wrap">
                     <div class="product-image-summary col-sm-12">
                        <div class="row product-image-summary-inner">
                           <div class="col-sm-6 product-images">
                              <div class="product-images-inner">
                                 <div class="shopify-product-gallery shopify-product-gallery--with-images shopify-product-gallery--columns-4 images row thumbs-position-left image-action-zoom" style="opacity: 1; transition: opacity .25s ease-in-out;">
                                    <div class="col-md-9 ">
                                       <figure class="shopify-product-gallery__wrapper owl-items-xl-1 owl-items-lg-1 owl-items-md-1 owl-items-sm-1">
                                          <div class="product-image-wrap">
                                             <figure data-thumb="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_1_150x_crop_center.jpg?v=1516200417" data-zoom="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_1.jpg?v=1516200417" class="shopify-product-gallery__image">
                                                <a href="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_1b0c8.jpg?v=1516200417">
                                                <img data-image-id="2718571659306" width="600" height="" src="/assets/upload/product/{{$detail->image}}" class="attachment-shop_single size-shop_single" alt="{{$detail->name}}"   sizes="(max-width: 600px) 100vw, 600px" />
                                                </a>
                                             </figure>
                                          </div>
                                          <div class="product-image-wrap">
                                             <figure data-thumb="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2_150x_crop_center.jpg?v=1516200422" data-zoom="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2.jpg?v=1516200422" class="shopify-product-gallery__image">
                                                <a href="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2a2da.jpg?v=1516200422">
                                                <img data-image-id="2718572609578" width="600" height="" src="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2_600x_crop_centera2da.jpg?v=1516200422" class="attachment-shop_single size-shop_single" alt="" title="Grand comfort chair" data-caption="" data-src="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2a2da.jpg?v=1516200422" data-large_image="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2a2da.jpg?v=1516200422" data-large_image_width="700" data-large_image_height="800" srcset="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2_600x_crop_center.jpg?v=1516200422 600w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2_131x131.jpg?v=1516200422 131w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2_263x300.jpg?v=1516200422 263w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2_88x100.jpg?v=1516200422 88w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2_200x230.jpg?v=1516200422 200w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2_430x490.jpg?v=1516200422 430w" sizes="(max-width: 600px) 100vw, 600px" />
                                                </a>
                                             </figure>
                                          </div>
                                          <div class="product-image-wrap">
                                             <figure data-thumb="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3_150x_crop_center.jpg?v=1516200434" data-zoom="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3.jpg?v=1516200434" class="shopify-product-gallery__image">
                                                <a href="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3681d.jpg?v=1516200434">
                                                <img data-image-id="2718578147370" width="600" height="" src="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3_600x_crop_center681d.jpg?v=1516200434" class="attachment-shop_single size-shop_single" alt="" title="Grand comfort chair" data-caption="" data-src="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3681d.jpg?v=1516200434" data-large_image="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3681d.jpg?v=1516200434" data-large_image_width="700" data-large_image_height="800" srcset="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3_600x_crop_center.jpg?v=1516200434 600w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3_131x131.jpg?v=1516200434 131w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3_263x300.jpg?v=1516200434 263w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3_88x100.jpg?v=1516200434 88w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3_200x230.jpg?v=1516200434 200w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-3_430x490.jpg?v=1516200434 430w" sizes="(max-width: 600px) 100vw, 600px" />
                                                </a>
                                             </figure>
                                          </div>
                                          <div class="product-image-wrap">
                                             <figure data-thumb="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_150x_crop_center.jpg?v=1516200436" data-zoom="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10.jpg?v=1516200436" class="shopify-product-gallery__image">
                                                <a href="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-109c08.jpg?v=1516200436">
                                                <img data-image-id="2718578835498" width="600" height="" src="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_600x_crop_center9c08.jpg?v=1516200436" class="attachment-shop_single size-shop_single" alt="" title="Grand comfort chair" data-caption="" data-src="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-109c08.jpg?v=1516200436" data-large_image="../../../../cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-109c08.jpg?v=1516200436" data-large_image_width="700" data-large_image_height="800" srcset="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_600x_crop_center.jpg?v=1516200436 600w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_131x131.jpg?v=1516200436 131w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_263x300.jpg?v=1516200436 263w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_88x100.jpg?v=1516200436 88w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_200x230.jpg?v=1516200436 200w, 
                                                   //cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_430x490.jpg?v=1516200436 430w" sizes="(max-width: 600px) 100vw, 600px" />
                                                </a>
                                             </figure>
                                          </div>
                                       </figure>
                                       <div class="product-additional-galleries">
                                          <div id="shopify-section-in-section-product-360-images" class="shopify-section">
                                          </div>
                                          <div class="woodmart-show-product-gallery-wrap">
                                             <a href="#" class="woodmart-show-product-gallery"><span data-translate="products.product.lightbox_gallery">Click to enlarge</span></a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-3 col-md-pull-9">
                                       <div class="thumbnails owl-items-md-3 owl-items-sm-3"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-6 summary entry-summary">
                              <div class="summary-inner">
                                 <h1 itemprop="name" class="product_title entry-title"> 
                                    <span class="">{{$detail->name}}</span>
                                    {{-- <span class="lang2">Grand comfort chair</span> --}}
                                 </h1>
                                 <div class="shopify-product-rating">
                                    <div class="star-rating">
                                       <span class="shopify-product-reviews-badge" data-id="790550872106"></span>
                                    </div>
                                 </div>
                                 <div class="price-box">
                                    <span class="price">
                                    <span class="shopify-Price-amount amount"><span class="money">{{number_format($detail->price)}}đ</span></span>
                                    </span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                    <link itemprop="availability" href="http://schema.org/InStock" />
                                 </div>
                                 <div class="shopify-product-details__short-description">
                                    <div class="short-description">
                                       <div class="">{{$detail->description}}</div>
                                       {{-- <div class="lang2">Placerat tempor dolor eu leo ullamcorper et magnis habitant ultrices consectetur arcu nulla mattis fermentum adipiscing a et bibendum sed platea malesuada eget vestibulum.</div> --}}
                                    </div>
                                 </div>
                                 <div class="product-type-main">
                                    {{-- <form class=""  action="/cart/add/1" method="get"  > --}}
                                       {{-- {{csrf_field()}} --}}
                                       {{-- <div id="product-variants" class="product-options">
                                          <select id="product-selectors" name="id" style="display: none;">
                                             <option selected="selected" value="9791703056426">Red - $850.00 USD</option>
                                             <option value="9791703089194">Yellow - $850.00 USD</option>
                                          </select>
                                       </div> --}}
                                       <div class="single_variation_wrap">
                                          <div class="shopify-variation-add-to-cart variations_button shopify-variation-add-to-cart-disabled">
                                             <div class="quantity">
                                                <input type="button" value="-" class="minus" >
                                                <input type="number" id="qty" name="quantity" value="1" >
                                                <input type="button" value="+" class="plus" >
                                             </div>
                                             <button type="button" id="{{$detail->id}}"  class="add_to_cart button">
                                             <span >Add to Cart</span>
                                             </button>
                                             {{-- <input type="submit" class="button" value="Add to Cart"> --}}

                                          </div>
                                       </div>
                                    {{-- </form> --}}
                                 </div>
                                 <div class="yith-wcwl-add-to-wishlist"><a href="javascript:;" data-product-handle="grand-comfort-chair" data-product-title="Grand comfort chair" class="link-wishlist add_to_wishlist" title="Add to wishlist"><span data-translate="wish_list.general.add_to_wishlist">Add to wishlist</span></a></div>
                                 <div class="compare-btn-wrapper product-compare-button"><a href="javascript:;" data-product-handle="grand-comfort-chair" data-product-title="Grand comfort chair" class="link-compare" title="Add to compare"><span data-translate="compare_list.general.add_to_compare">Add to compare</span></a></div>
                                 <div id="woodmart_sizeguide" class="mfp-with-anim woodmart-content-popup woodmart-sizeguide mfp-hide">
                                    <img src="../../../../cdn.shopify.com/s/files/1/2576/3756/files/tab_size_chartec62.png?v=1519876977" />
                                 </div>
                                 <div class="sizeguide-btn-wrapp">
                                    <a href="#woodmart_sizeguide" class="woodmart-open-popup woodmart-sizeguide-btn">
                                    <span class="lang1">Size Guide</span>
                                    <span class="lang2">Size Guide</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         {{-- cat o day --}}<br>
               {{-- <div class="product-tabs-wrapper">
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-12 poduct-tabs-inner">
                           <div id="shopify-section-in-section-product-page-tab" class="shopify-section">
                              <div class="shopify-tabs wc-tabs-wrapper tabs-layout-tabs">
                                 <ul class="tabs wc-tabs">
                                    <li class="description_tab active">
                                       <a href="#tab-description">
                                          <div class="lang1">Description</div>
                                          <div class="lang2">Description</div>
                                       </a>
                                    </li>
                                    <li class="reviews_tab">
                                       <a href="#tab-reviews">
                                          <div class="lang1">Reviews</div>
                                          <div class="lang2">Reviews</div>
                                       </a>
                                    </li>
                                    <li class="additional_tab">
                                       <a href="#tab-additional_information">
                                          <div class="lang1">Additional Information</div>
                                          <div class="lang2">Additional Information</div>
                                       </a>
                                    </li>
                                    <li class="html_tab">
                                       <a href="#1511861550761">
                                          <div class="lang1">Shipping & Delivery</div>
                                          <div class="lang2">Shipping & Delivery</div>
                                       </a>
                                    </li>
                                 </ul>
                                 <div class="woodmart-tab-wrapper">
                                    <a href="#tab-description" class="woodmart-accordion-title tab-title-description active">
                                       <div class="lang1">Description</div>
                                       <div class="lang2">Description</div>
                                    </a>
                                    <div class="shopify-Tabs-panel shopify-Tabs-panel- -description entry-content wc-tab" id="tab-description">
                                       <div class="wc-tab-inner ">
                                          <div class="lang1">
                                             <div class="">
                                                <div class="vc_row wpb_row vc_row-fluid">
                                                   <div class="wpb_column vc_column_container vc_col-sm-12">
                                                      <div class="vc_column-inner vc_custom_1493038156710">
                                                         <div class="wpb_wrapper">
                                                            <div id="woodmart-title-id-5a951c5e51681" class="title-wrapper  woodmart-title-color-default woodmart-title-style-default woodmart-title-size-small woodmart-title-width-100 text-left ">
                                                               <div class="liner-continer">
                                                                  <span class="left-line"></span>
                                                                  <h4 class="woodmart-title-container title  woodmart-font-weight-">IMPERDIET HIMENAEOS MATTIS</h4>
                                                                  <span class="right-line"></span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="vc_row wpb_row vc_row-fluid vc_row-o-content-top vc_row-flex">
                                                   <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-6">
                                                      <div class="vc_column-inner ">
                                                         <div class="wpb_wrapper">
                                                            <div class="wpb_text_column wpb_content_element ">
                                                               <div class="wpb_wrapper">
                                                                  <p>A a at habitasse inceptos a quisque nibh ut arcu et dictum laoreet elit ante scelerisque libero consectetur erat non a suspendisse ad phasellus phasellus suspendisse gravida eu. Dapibus congue libero sem at dis a a adipiscing parturient eros diam parturient sodales consectetur quis.</p>
                                                                  <blockquote>
                                                                     <p>Consequat blandit a ullamcorper vestibulum feugiat eu a parturient ante at facilisi suscipit quis gravida tempor fringilla etiam dolor id suspendisse adipiscing natoque scelerisque es vivamus sed massa.</p>
                                                                  </blockquote>
                                                                  <p>A sodales hac dolor parturient tincidunt dictumst a condimentum nunc auctor parturient a nibh dis a vestibulum arcu a a. Urna rhoncus eleifend parturient condimentum et vulputate nunc. Ut dolor condimentum hendrerit non mattis a commodo sociis mi nec rutrum parturient litora.</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-6">
                                                      <div class="vc_column-inner ">
                                                         <div class="wpb_wrapper">
                                                            <div class="wpb_single_image wpb_content_element vc_align_left">
                                                               <figure class="wpb_wrapper vc_figure">
                                                                  <div class="vc_single_image-wrapper   vc_box_border_grey"><img width="750" height="373" src="../../../../wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3.jpg" class="vc_single_image-img attachment-full" alt="" srcset="https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3.jpg 750w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-150x75.jpg 150w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-400x199.jpg 400w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-100x50.jpg 100w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-200x99.jpg 200w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-430x214.jpg 430w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-700x348.jpg 700w" sizes="(max-width: 750px) 100vw, 750px"></div>
                                                               </figure>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="lang2">
                                             <div class="">
                                                <div class="vc_row wpb_row vc_row-fluid">
                                                   <div class="wpb_column vc_column_container vc_col-sm-12">
                                                      <div class="vc_column-inner vc_custom_1493038156710">
                                                         <div class="wpb_wrapper">
                                                            <div id="woodmart-title-id-5a951c5e51681" class="title-wrapper  woodmart-title-color-default woodmart-title-style-default woodmart-title-size-small woodmart-title-width-100 text-left ">
                                                               <div class="liner-continer">
                                                                  <span class="left-line"></span>
                                                                  <h4 class="woodmart-title-container title  woodmart-font-weight-">IMPERDIET HIMENAEOS MATTIS</h4>
                                                                  <span class="right-line"></span>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="vc_row wpb_row vc_row-fluid vc_row-o-content-top vc_row-flex">
                                                   <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-6">
                                                      <div class="vc_column-inner ">
                                                         <div class="wpb_wrapper">
                                                            <div class="wpb_text_column wpb_content_element ">
                                                               <div class="wpb_wrapper">
                                                                  <p>A a at habitasse inceptos a quisque nibh ut arcu et dictum laoreet elit ante scelerisque libero consectetur erat non a suspendisse ad phasellus phasellus suspendisse gravida eu. Dapibus congue libero sem at dis a a adipiscing parturient eros diam parturient sodales consectetur quis.</p>
                                                                  <blockquote>
                                                                     <p>Consequat blandit a ullamcorper vestibulum feugiat eu a parturient ante at facilisi suscipit quis gravida tempor fringilla etiam dolor id suspendisse adipiscing natoque scelerisque es vivamus sed massa.</p>
                                                                  </blockquote>
                                                                  <p>A sodales hac dolor parturient tincidunt dictumst a condimentum nunc auctor parturient a nibh dis a vestibulum arcu a a. Urna rhoncus eleifend parturient condimentum et vulputate nunc. Ut dolor condimentum hendrerit non mattis a commodo sociis mi nec rutrum parturient litora.</p>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-6">
                                                      <div class="vc_column-inner ">
                                                         <div class="wpb_wrapper">
                                                            <div class="wpb_single_image wpb_content_element vc_align_left">
                                                               <figure class="wpb_wrapper vc_figure">
                                                                  <div class="vc_single_image-wrapper   vc_box_border_grey"><img width="750" height="373" src="../../../../wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3.jpg" class="vc_single_image-img attachment-full" alt="" srcset="https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3.jpg 750w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-150x75.jpg 150w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-400x199.jpg 400w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-100x50.jpg 100w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-200x99.jpg 200w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-430x214.jpg 430w, https://wood.r.worldssl.net/wp-content/uploads/2016/09/chair-schematics-3-700x348.jpg 700w" sizes="(max-width: 750px) 100vw, 750px"></div>
                                                               </figure>
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
                                 <div class="woodmart-tab-wrapper">
                                    <a href="#tab-reviews" class="woodmart-accordion-title tab-title-reviews">
                                       <div class="lang1">Reviews</div>
                                       <div class="lang2">Reviews</div>
                                    </a>
                                    <div class="shopify-Tabs-panel shopify-Tabs-panel--reviews entry-content wc-tab" id="tab-reviews" style="display: none;">
                                       <div class="wc-tab-inner ">
                                          <div id="shopify-product-reviews" data-id="790550872106"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="woodmart-tab-wrapper">
                                    <a href="#tab-additional_information" class="woodmart-accordion-title tab-title-additional_tab">
                                       <div class="lang1">Additional Information</div>
                                       <div class="lang2">Additional Information</div>
                                    </a>
                                    <div class="shopify-Tabs-panel shopify-Tabs-panel--additional_tab entry-content wc-tab" id="tab-additional_information" style="display: none;">
                                       <div class="wc-tab-inner ">
                                          <div class="lang1">
                                             <table class="shop_attributes">
                                                <tbody>
                                                   <tr>
                                                      <th>Brand</th>
                                                      <td>
                                                         <p>Eva Solo</p>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <th>Color</th>
                                                      <td>
                                                         <p>Red, Yellow</p>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                          <div class="lang2">
                                             <table class="shop_attributes">
                                                <tbody>
                                                   <tr>
                                                      <th>Brand</th>
                                                      <td>
                                                         <p>Eva Solo</p>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <th>Color</th>
                                                      <td>
                                                         <p>Red, Yellow</p>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="woodmart-tab-wrapper">
                                    <a href="#1511861550761" class="woodmart-accordion-title tab-title-woodmart_html_tab">
                                       <div class="lang1">Shipping & Delivery</div>
                                       <div class="lang2">Shipping & Delivery</div>
                                    </a>
                                    <div class="shopify-Tabs-panel shopify-Tabs-panel--woodmart_html_tab entry-content wc-tab" id="1511861550761" style="display: none;">
                                       <div class="wc-tab-inner ">
                                          <div class="lang1"></div>
                                          <div class="lang2"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <script type="text/javascript">
                                 jQuery(function(a) {
                                     a("body").on("init", ".wc-tabs-wrapper, .shopify-tabs", function() {
                                         a(".sp-tab, .shopify-tabs .panel:not(.panel .panel)").hide();
                                         var b = window.location.hash,
                                             c = window.location.href,
                                             d = a(this).find(".wc-tabs, ul.tabs").first();
                                         b.toLowerCase().indexOf("comment-") >= 0 || "#reviews" === b || "#tab-reviews" === b ? d.find("li.reviews_tab a").click() : c.indexOf("comment-page-") > 0 || c.indexOf("cpage=") > 0 ? d.find("li.reviews_tab a").click() : d.find("li:first a").click()
                                     }).on("click", ".wc-tabs li a, ul.tabs li a", function(b) {
                                         b.preventDefault();
                                         var c = a(this),
                                             d = c.closest(".wc-tabs-wrapper, .shopify-tabs"),
                                             e = d.find(".wc-tabs, ul.tabs");
                                         e.find("li").removeClass("active"),
                                             d.find(".wc-tab, .panel:not(.panel .panel)").hide(),
                                             c.closest("li").addClass("active"),
                                             d.find(c.attr("href")).show()
                                     }), void a(".wc-tabs-wrapper, .shopify-tabs").trigger("init");
                                 });
                              </script>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> --}}
               {{-- cat o day --}}

               <div class="woodmart-before-product-tabs">
                  <div class="container">
                     <div class="product_meta"><span class="sku_wrapper"><b data-translate="products.product.sku">SKU: </b><span class="sku">N/A</span></span><span class="posted_in"><label data-translate="products.product.product_category">Categories:</label> 
                        &nbsp;<a href="../../furniture.html" title="">Furniture</a><span class="meta-sep">,</span><a href="../../shop.html" title="">Shop</a></span>
                     </div>
                     <div class="product-share">
                        <span class="share-title" data-translate="products.product.button_share">Share:</span>
                        <div class="woodmart-social-icons text-center icons-design-default icons-size-small color-scheme-dark social-share social-form-circle">
                           <div class="woodmart-social-icon social-facebook">
                              <a href="https://www.facebook.com/sharer/sharer.php?u=https://woodmart-default.myshopify.com/products/grand-comfort-chair" target="_blank" class="">
                              <i class="fa fa-facebook"></i>
                              <span class="woodmart-social-icon-name">Facebook</span>
                              </a>
                           </div>
                           <div class="woodmart-social-icon social-twitter">
                              <a href="http://twitter.com/share?url=https://woodmart-default.myshopify.com/products/grand-comfort-chair" target="_blank" class="">
                              <i class="fa fa-twitter"></i>
                              <span class="woodmart-social-icon-name">Twitter</span>
                              </a>
                           </div>
                           <div class="woodmart-social-icon social-google">
                              <a href="http://plus.google.com/share?url=https://woodmart-default.myshopify.com/products/grand-comfort-chair" target="_blank" class="">
                              <i class="fa fa-google-plus"></i>
                              <span class="woodmart-social-icon-name">Google</span>
                              </a>
                           </div>
                           <div class="woodmart-social-icon social-email">
                              <a href="mailto:?subject=Check this https://woodmart-default.myshopify.com/products/grand-comfort-chair" target="_blank" class="">
                              <i class="fa fa-envelope"></i>
                              <span class="woodmart-social-icon-name">Email</span>
                              </a>
                           </div>
                           <div class="woodmart-social-icon social-pinterest">
                              <a href="../../../../pinterest.com/pin/create/button/index3eed.html?url=https://woodmart-default.myshopify.com/products/grand-comfort-chair&amp;//cdn.shopify.com/s/assets/no-image-2048-5e88c1b20e087fb7bbe9a3771824e743c244f437e4f8ba93bbf7b11b53f7824c_1024x460.gif" target="_blank" class="">
                              <i class="fa fa-pinterest"></i>
                              <span class="woodmart-social-icon-name">Pinterest</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="clearfix"></div>
   <div class="container related-and-upsells">
      <div class="related products">
         <h3 class="title slider-title">
            <span class="inner" data-translate="products.general.related_products">RELATED PRODUCTS</span>
         </h3>
         
         <div class="vc_carousel_container">
            <div class="data-carousel" data-items="4" data-auto="" data-paging="true" data-320="2" data-414="2" data-768="2" data-992="3" data-1200="4" data-margin="0" data-nav="true" data-prev='' data-next='' style="display: none;"></div>
            <div class="owl-items-xl-4 owl-items-lg-3 owl-items-md-3 owl-items-sm-1 owl-carousel slider-type-post carousel-init">
               @foreach ($relate as $r_p)
                  
              
               <div class="slide-product owl-carousel-item">
                  <div class="owl-carousel-item-inner">
                     <div class="product-grid-item product has-stars purchasable woodmart-hover-base quick-shop-on product-type-variable  product-with-swatches  type-product status-publish has-post-thumbnail first instock sale hover-width-small product-in-carousel" data-loop="2" data-id="7791006384170">
                        <div class="content-product-imagin"></div>
                        <div class="product-element-top">
                           <a href="/{{str_slug($slug_name)}}/{{$r_p->slug}}" class="product-image-link"><img src="../assets/upload/product/{{$r_p->image}}" class="attachment-shop_catalog size-shop_catalog" alt="{{$r_p->name}}">
                           </a>
                           <div class="hover-img">
                              <a href="/{{str_slug($slug_name)}}/{{$r_p->slug}}">
                              <img src="../assets/upload/product/{{$r_p->image}}" class="attachment-shop_catalog size-shop_catalog" alt="{{$r_p->name}}">
                              </a>
                           </div>
                           {{-- <div class="wrapp-swatches">
                              <div class="swatches-on-grid">
                                 <div class="swatch-on-grid woodmart-tooltip swatch-has-image swatch-size-default" style="background-image: url(../../../../cdn.shopify.com/s/files/1/2576/3756/t/53/assets/black6512.png?11)" data-image-src="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-8_290x290_crop_center.jpg?v=1516095595" data-original-title="" title="">
                                    Black
                                 </div>
                                 <div class="swatch-on-grid woodmart-tooltip swatch-has-image swatch-size-default" style="background-image: url(../../../../cdn.shopify.com/s/files/1/2576/3756/t/53/assets/gray6512.png?11)" data-image-src="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-8-2_290x290_crop_center.jpg?v=1516095595" data-original-title="" title="">
                                    Gray
                                 </div>
                              </div>
                              <div class="product-compare-button">
                                 <a href="javascript:;" data-product-handle="eames-lounge-chair" data-product-title="Eames lounge chair" class="compare button"><span data-translate="compare_list.general.add_to_compare">Add to compare</span></a>
                              </div>
                           </div> --}}
                           <div class="quick-shop-wrapper">
                              <div class="quick-shop-close"><span data-translate="collections.general.close">Close</span></div>
                              <div class="quick-shop-form"></div>
                           </div>
                        </div>
                        <div class="product-information">
                           <h3 class="product-title">
                              <a href="123">
                              <span class="">{{$r_p->name}}</span>
                              {{-- <span class="lang2">Eames lounge chair</span> --}}
                              </a>
                           </h3>
                           {{-- <div class="woodmart-product-cats"><a href="../../furniture.html" title="">Furniture</a>,&nbsp;<a href="../../shop.html" title="">Shop</a></div> --}}
                           <div class="product-rating-price">
                              <div class="wrapp-product-price">
                                 <div class="star-rating">
                                    <span class="shopify-product-reviews-badge" data-id="572156969002"></span>
                                 </div>
                                 <span class="price">
                                 <span class="shopify-Price-amount amount"><span class="money">{{number_format($r_p->price)}}đ</span></span>
                                 </span>
                              </div>
                           </div>
                           <div class="fade-in-block">
                              <div class="hover-content">
                                 <div class="hover-content-inner">
                                    {{-- <div class="lang1">Cubilia vestibulum interdum nisl a parturient a auctor vestibulum taciti vel bibendum tempor adipiscing suspendisse posuere libero penatibus lorem at interdum tristique iaculis redosan condimentum a ac rutrum mollis consectetur....</div>
                                    <div class="lang2">Cubilia vestibulum interdum nisl a parturient a auctor vestibulum taciti vel bibendum tempor adipiscing suspendisse posuere libero penatibus lorem at interdum tristique iaculis redosan condimentum a ac rutrum mollis consectetur....</div> --}}
                                 </div>
                              </div>
                              <div class="woodmart-buttons">
                                 <div class="wrap-wishlist-button">
                                    <a href="javascript:;" data-product-handle="eames-lounge-chair" data-product-title="Eames lounge chair" class="add_to_wishlist" title="Add to wishlist"><span data-translate="wish_list.general.add_to_wishlist">Add to wishlist</span></a>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="woodmart-add-btn" data-original-title="" title="">
                                    <a id="{{$r_p->id}}" class="add_to_cart button product_type_variable add-to-cart-loop">
                                    <span data-translate="products.product.select_options">Select Options</span>
                                    </a>
                                 </div>
                                 <div class="wrap-quickview-button">
                                    <div class="quick-view">
                                       <a href="../../../products/eames-lounge-chair95b3.html?view=quickview" class="quickview-icon quickview open-quick-view woodmart-tltp">
                                       <span data-translate="collections.general.quickview">Quick View</span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

                @endforeach

               
            </div>
         </div>
      </div>
   </div>
</div>



@endsection
@section('customJS')
<script src="assets/customJS.js" type="text/javascript"></script>
@endsection