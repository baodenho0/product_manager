@php
    $menu = \App\Menu::where('name','master')->get()->first();
    if($menu){
        $items = $menu->items()->with('childs')->where('parent_id',0)->orderBy('order','asc')->get();
    }
@endphp
<div class="site-navigation woodmart-navigation menu-left navigation-style-default main-nav">
   <div class="menu-main-navigation-container">
      <div id="shopify-section-main-menu" class="shopify-section">
         <ul id="menu-main-navigation" class="menu">
            @foreach ($items as $item)
            
            @if (count($item->childs) == 0)
               
            
            <li id="menu-item-1525845766969" class="menu-item menu-item-type-custom menu-item-home item-level-0 menu-item-1525845766969 menu-item-no-children with-offsets">
               <a target="{{ $item->target }}" href="{{$item->url}}" class="woodmart-nav-link"><span>
               <span class="">{{$item->title}}</span>
               {{-- <span class="lang2">Home</span> --}}
               </span></a>
               <style type="text/css"></style>
            </li>

            @else
            <li id="menu-item-1514566951009" class="menu-item menu-item-type-post_type menu-item-shop menu-item-1514566951009 menu-item-design-full-width menu-mega-dropdown item-level-0 item-event-hover menu-item-has-children with-offsets">
               <a target="{{ $item->target }}" href="{{$item->url}}" class="woodmart-nav-link"><span>
               <span class="">{{$item->title}}</span>
               {{-- <span class="lang2">Shop</span> --}}
               </span></a>
               <div class="sub-menu-dropdown color-scheme-dark">
                  <div class="container">
                     <div class="vc_section vc_custom_1482224730326">
                        <div class="vc_row wpb_row vc_row-fluid vc_row-o-content-top vc_row-flex">
                           {{-- foreach --}}
                            @foreach ($item->childs as $child)
                           <div class="wpb_column vc_column_container vc_col-sm-2">
                              <div class="vc_column-inner">
                                 <div class="wpb_wrapper">
                                    
                                    <ul class="sub-menu mega-menu-list">
                                      
                                          
                                       
                                       <li>
                                          <a target="{{ $child->target }}" href="{{$child->url}}">
                                          <span>
                                          <span class="">{{$child->title}}</span>
                                          {{-- <span class="lang2">Shop pages</span> --}}
                                          </span>
                                          </a>
                                          @php
                                             $items_child = $menu->items()->with('childs')->where('parent_id',$child->id)->orderBy('order','asc')->get();
                                          @endphp
                                          @foreach ($items_child as $i_c)
                                                                                    
                                           <ul class="sub-sub-menu">
                                             <li>
                                                <a target="{{ $i_c->target }}" href="{{$i_c->url}}">
                                                <span>
                                                <span class="">{{$i_c->title}}</span>
                                                {{-- <span class="lang2">Filters area</span> --}}
                                                </span>
                                                </a>
                                             </li>
                                            </ul> 
                                          @endforeach

                                       </li>
                                      
                                    </ul>
                                    
                                 </div>
                              </div>
                           </div>
                            @endforeach
                           {{-- end foreach --}}

                           {{-- <div class="wpb_column vc_column_container vc_col-sm-2">
                              <div class="vc_column-inner">
                                 <div class="wpb_wrapper">
                                    <ul class="sub-menu mega-menu-list">
                                       <li class="item-with-label item-label-effects">
                                          <a href="#">
                                          <span>
                                          <span class="lang1">Product hovers</span>
                                          <span class="lang2">Product hovers</span>
                                          </span><span class="menu-label menu-label-effects">EFFECTS</span></a>
                                          <ul class="sub-sub-menu">
                                             <li>
                                                <a href="collections/shop/indexcb03.html?preview_theme_id=32546324522">
                                                <span>
                                                <span class="lang1">Summary on hover</span>
                                                <span class="lang2">Summary on hover</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/index6bcf.html?preview_theme_id=31817760810">
                                                <span>
                                                <span class="lang1">Icons on hover</span>
                                                <span class="lang2">Icons on hover</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/indexa6f8.html?preview_theme_id=31817367594">
                                                <span>
                                                <span class="lang1">Icons & Add to cart</span>
                                                <span class="lang2">Icons & Add to cart</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/index0849.html?preview_theme_id=31817236522">
                                                <span>
                                                <span class="lang1">Full info on image</span>
                                                <span class="lang2">Full info on image</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/index57ef.html?preview_theme_id=31817334826">
                                                <span>
                                                <span class="lang1">All info on hover</span>
                                                <span class="lang2">All info on hover</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/indexce54.html?preview_theme_id=31817728042">
                                                <span>
                                                <span class="lang1">Button on image</span>
                                                <span class="lang2">Button on image</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/index1e2a.html?preview_theme_id=31817269290">
                                                <span>
                                                <span class="lang1">Standard button</span>
                                                <span class="lang2">Standard button</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/indexa428.html?preview_theme_id=31817891882">
                                                <span>
                                                <span class="lang1">Quick shop</span>
                                                <span class="lang2">Quick shop</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/indexa428.html?preview_theme_id=31817891882">
                                                <span>
                                                <span class="lang1">Categories hover #1</span>
                                                <span class="lang2">Categories hover #1</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/index03ad.html?preview_theme_id=31817826346">
                                                <span>
                                                <span class="lang1">Categories hover #2</span>
                                                <span class="lang2">Categories hover #2</span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div> --}}
                          {{--  <div class="wpb_column vc_column_container vc_col-sm-2">
                              <div class="vc_column-inner">
                                 <div class="wpb_wrapper">
                                    <ul class="sub-menu mega-menu-list">
                                       <li class="item-with-label item-label-unlimited">
                                          <a href="#">
                                          <span>
                                          <span class="lang1">Product pages</span>
                                          <span class="lang2">Product pages</span>
                                          </span><span class="menu-label menu-label-unlimited">UNLIMITED</span></a>
                                          <ul class="sub-sub-menu">
                                             <li>
                                                <a href="collections/shop/products/henectus-tincidunt/indexcb03.html?preview_theme_id=32546324522">
                                                <span>
                                                <span class="lang1">Default</span>
                                                <span class="lang2">Default</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/index5d67.html?preview_theme_id=31817990186">
                                                <span>
                                                <span class="lang1">Centered</span>
                                                <span class="lang2">Centered</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/indexbaf6.html?preview_theme_id=31817662506">
                                                <span>
                                                <span class="lang1">Sticky description</span>
                                                <span class="lang2">Sticky description</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/indexa088.html?preview_theme_id=31816712234">
                                                <span>
                                                <span class="lang1">With shadow</span>
                                                <span class="lang2">With shadow</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/penatibus-parturient-orci-morbi/index5d67.html?preview_theme_id=31817990186">
                                                <span>
                                                <span class="lang1">With background</span>
                                                <span class="lang2">With background</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li class="item-with-label item-label-new">
                                                <a href="collections/shop/products/smart-watches-wood-edition/indexbaf6.html?preview_theme_id=31817662506">
                                                <span>
                                                <span class="lang1">Accordion tabs</span>
                                                <span class="lang2">Accordion tabs</span>
                                                </span>
                                                <span class="menu-label menu-label-new">NEW</span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/indexa428.html?preview_theme_id=31817891882">
                                                <span>
                                                <span class="lang1">Accordion in content</span>
                                                <span class="lang2">Accordion in content</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/index1e2a.html?preview_theme_id=31817269290">
                                                <span>
                                                <span class="lang1">With sidebar</span>
                                                <span class="lang2">With sidebar</span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div> --}}
                           {{-- <div class="wpb_column vc_column_container vc_col-sm-2">
                              <div class="vc_column-inner">
                                 <div class="wpb_wrapper">
                                    <ul class="sub-menu mega-menu-list">
                                       <li>
                                          <a href="#">
                                          <span>
                                          <span class="lang1">Product images</span>
                                          <span class="lang2">Product images</span>
                                          </span>
                                          </a>
                                          <ul class="sub-sub-menu">
                                             <li>
                                                <a href="collections/accessories/products/interdum-elit-vestibulum.html">
                                                <span>
                                                <span class="lang1"> Thumbnails left</span>
                                                <span class="lang2"> Thumbnails left</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/index4b1f.html?preview_theme_id=31755272234">
                                                <span>
                                                <span class="lang1">Thumbnails bottom</span>
                                                <span class="lang2">Thumbnails bottom</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/index7575.html?preview_theme_id=31724929066">
                                                <span>
                                                <span class="lang1">Sticky images</span>
                                                <span class="lang2">Sticky images</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/index72b6.html?preview_theme_id=31736660010">
                                                <span>
                                                <span class="lang1">One column</span>
                                                <span class="lang2">One column</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/index03ad.html?preview_theme_id=31817826346">
                                                <span>
                                                <span class="lang1">Two columns</span>
                                                <span class="lang2">Two columns</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/henectus-tincidunt/index0849.html?preview_theme_id=31817236522">
                                                <span>
                                                <span class="lang1">Combined grid</span>
                                                <span class="lang2">Combined grid</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/indexcb03.html?preview_theme_id=32546324522">
                                                <span>
                                                <span class="lang1">Zoom image</span>
                                                <span class="lang2">Zoom image</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/henectus-tincidunt/index6bcf.html?preview_theme_id=31817760810">
                                                <span>
                                                <span class="lang1">Images size - small</span>
                                                <span class="lang2">Images size - small</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/indexa6f8.html?preview_theme_id=31817367594">
                                                <span>
                                                <span class="lang1">Images size - large</span>
                                                <span class="lang2">Images size - large</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/smart-watches-wood-edition/indexce54.html?preview_theme_id=31817728042">
                                                <span>
                                                <span class="lang1">Without thumbnails</span>
                                                <span class="lang2">Without thumbnails</span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div> --}}
                           {{-- <div class="wpb_column vc_column_container vc_col-sm-2">
                              <div class="vc_column-inner">
                                 <div class="wpb_wrapper">
                                    <ul class="sub-menu mega-menu-list">
                                       <li>
                                          <a href="#">
                                          <span>
                                          <span class="lang1">Shopify</span>
                                          <span class="lang2">Shopify</span>
                                          </span>
                                          </a>
                                          <ul class="sub-sub-menu">
                                             <li>
                                                <a href="collections/cooking/products/interdum-elit-vestibulum/indexcb03.html?preview_theme_id=32546324522">
                                                <span>
                                                <span class="lang1">Simple product</span>
                                                <span class="lang2">Simple product</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/accessories/products/wooden-bow-tie-man/index57ef.html?preview_theme_id=31817334826">
                                                <span>
                                                <span class="lang1">Variable product</span>
                                                <span class="lang2">Variable product</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/eames-plastic-side-chair/index3c49.html?preview_theme_id=31817400362">
                                                <span>
                                                <span class="lang1">Variant image product</span>
                                                <span class="lang2">Variant image product</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="cart.html">
                                                <span>
                                                <span class="lang1">Shopping Cart</span>
                                                <span class="lang2">Shopping Cart</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="25763756/checkouts/2726cbffc37a679f213b986deff7c3ea.html">
                                                <span>
                                                <span class="lang1">Checkout</span>
                                                <span class="lang2">Checkout</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="account/login.html">
                                                <span>
                                                <span class="lang1">My account</span>
                                                <span class="lang2">My account</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="account/login.html">
                                                <span>
                                                <span class="lang1">Wishlist</span>
                                                <span class="lang2">Wishlist</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="404.html">
                                                <span>
                                                <span class="lang1">404 Not Found</span>
                                                <span class="lang2">404 Not Found</span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div> --}}
                          {{--  <div class="wpb_column vc_column_container vc_col-sm-2">
                              <div class="vc_column-inner">
                                 <div class="wpb_wrapper">
                                    <ul class="sub-menu mega-menu-list">
                                       <li class="item-with-label item-label-best">
                                          <a href="#">
                                          <span>
                                          <span class="lang1">Features</span>
                                          <span class="lang2">Features</span>
                                          </span><span class="menu-label menu-label-best">BEST</span></a>
                                          <ul class="sub-sub-menu">
                                             <li>
                                                <a href="collections/furniture/products/eames-plastic-side-chair/indexcb03.html?preview_theme_id=32546324522">
                                                <span>
                                                <span class="lang1">360° product viewer</span>
                                                <span class="lang2">360° product viewer</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/lighting/products/scelerisque-lacus/indexcb03.html?preview_theme_id=32546324522">
                                                <span>
                                                <span class="lang1">With video</span>
                                                <span class="lang2">With video</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/products/penatibus-parturient-orci-morbi/indexcb03.html?preview_theme_id=32546324522">
                                                <span>
                                                <span class="lang1">With countdown timer</span>
                                                <span class="lang2">With countdown timer</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/furniture/products/facilisis-ligula-aliquet/indexcb03.html?preview_theme_id=32546324522">
                                                <span>
                                                <span class="lang1">Variations swatches</span>
                                                <span class="lang2">Variations swatches</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li class="item-with-label item-label-new">
                                                <a href="collections/shop/indexbaf6.html?preview_theme_id=31817662506">
                                                <span>
                                                <span class="lang1">Infinit scrolling</span>
                                                <span class="lang2">Infinit scrolling</span>
                                                </span>
                                                <span class="menu-label menu-label-new">NEW</span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/index03ad.html?preview_theme_id=31817826346">
                                                <span>
                                                <span class="lang1">Load more button</span>
                                                <span class="lang2">Load more button</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="indexeb2e.html?preview_theme_id=31817433130">
                                                <span>
                                                <span class="lang1">Catalog mode</span>
                                                <span class="lang2">Catalog mode</span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div> --}}
                        </div>
                     </div>
                     {{--
                     <style type="text/css" data-type="vc_shortcodes-custom-css">
                        .vc_custom_1482224730326 {
                        padding-top: 5px !important;
                        padding-bottom: 5px !important
                        }
                     </style>
                     --}}
                  </div>
               </div>
               {{--
               <style type="text/css">
                  .menu-item-1514566951009 > .sub-menu-dropdown {
                  min-height: 120px;
                  width: 100%;
                  }
               </style>
               --}} 
            </li>

            {{-- <li id="menu-item-1515560575324" class="menu-item menu-item-type-post_type menu-item-blog menu-item-1515560575324 menu-item-design-sized menu-mega-dropdown item-level-0 item-event-hover menu-item-has-children with-offsets">
               <a href="blogs/news.html" class="woodmart-nav-link"><span>
               <span class="lang1">Blog</span>
               <span class="lang2">Blog</span>
               </span></a>
               <div class="sub-menu-dropdown color-scheme-dark">
                  <div class="container">
                     <div class="vc_section vc_custom_1482224730326">
                        <div class="vc_row wpb_row vc_row-fluid vc_row-o-equal-height vc_row-o-content-top vc_row-flex">
                           <div class="rtl-blog-col1 wpb_column vc_column_container vc_col-sm-3">
                              <div class="vc_column-inner vc_custom_1501507744264">
                                 <div class="wpb_wrapper">
                                    <ul class="sub-menu mega-menu-list">
                                       <li>
                                          <a href="index.html" class="current-menu-item">
                                          <span>
                                          <span class="lang1">Blog types</span>
                                          <span class="lang2">Blog types</span>
                                          </span>
                                          </a>
                                          <ul class="sub-sub-menu">
                                             <li>
                                                <a href="blogs/news/indexeb2e.html?preview_theme_id=31817433130" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Alternative</span>
                                                <span class="lang2">Alternative</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/index3c49.html?preview_theme_id=31817400362" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Small images</span>
                                                <span class="lang2">Small images</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/indexa6f8.html?preview_theme_id=31817367594" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Blog chess</span>
                                                <span class="lang2">Blog chess</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/index5d67.html?preview_theme_id=31817990186" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Masonry grid</span>
                                                <span class="lang2">Masonry grid</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li class="item-with-label item-label-feature">
                                                <a href="blogs/news/index1e2a.html?preview_theme_id=31817269290">
                                                <span>
                                                <span class="lang1">Infinit scrolling</span>
                                                <span class="lang2">Infinit scrolling</span>
                                                </span>
                                                <span class="menu-label menu-label-feature">FEATURE</span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/index0849.html?preview_theme_id=31817236522" class="current-menu-item">
                                                <span>
                                                <span class="lang1">With background</span>
                                                <span class="lang2">With background</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/index0849.html?preview_theme_id=31817236522" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Blog flat</span>
                                                <span class="lang2">Blog flat</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/indexa088.html?preview_theme_id=31816712234" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Default flat</span>
                                                <span class="lang2">Default flat</span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="rtl-blog-col2 wpb_column vc_column_container vc_col-sm-3">
                              <div class="vc_column-inner vc_custom_1501507744264">
                                 <div class="wpb_wrapper">
                                    <ul class="sub-menu mega-menu-list">
                                       <li>
                                          <a href="index.html" class="current-menu-item">
                                          <span>
                                          <span class="lang1">Single posts</span>
                                          <span class="lang2">Single posts</span>
                                          </span>
                                          </a>
                                          <ul class="sub-sub-menu">
                                             <li>
                                                <a href="blogs/news/green-interior-design-inspiration.html" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Post example #1</span>
                                                <span class="lang2">Post example #1</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/minimalist-design-furniture-2016.html" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Post example #2</span>
                                                <span class="lang2">Post example #2</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/design-trends/sweet-seat-functional-seat-for-it-folks.html" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Post example #3</span>
                                                <span class="lang2">Post example #3</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/reinterprets-the-classic-bookshelf.html" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Post example #4</span>
                                                <span class="lang2">Post example #4</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/creative-water-features-and-exterior.html" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Post example #5</span>
                                                <span class="lang2">Post example #5</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/furniture-that-explores-wood-as-a-material.html" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Post example #6</span>
                                                <span class="lang2">Post example #6</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/the-big-design-wall-likes-pictures.html" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Post example #7</span>
                                                <span class="lang2">Post example #7</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="blogs/news/new-home-decor-from-john-doerson.html" class="current-menu-item">
                                                <span>
                                                <span class="lang1">Post example #8</span>
                                                <span class="lang2">Post example #8</span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-has-fill">
                              <div class="vc_column-inner vc_custom_1498552559778">
                                 <div class="spb_wrapper">
                                    <div class="spb_widgetised_column spb_content_element">
                                       <div class="woodmart-widget sidebar-widget woodmart-recent-posts">
                                          <h5 class="widget-title" data-translate="blogs.article.recent_posts">Recent Posts</h5>
                                          <ul class="woodmart-recent-posts-list">
                                             <li>
                                                <a class="recent-posts-thumbnail" href="blogs/news/yellow-blue-design-concept-by-don-moerson.html"><img class="attachment-large sp-post-image " src="image/blog-14_105x84_crop_center57ce.jpg?v=1516256741" width="75" /></a>
                                                <div class="recent-posts-info">
                                                   <h5 class="entry-title">
                                                      <a href="blogs/news/yellow-blue-design-concept-by-don-moerson.html">
                                                      <span class="lang1">Yellow/blue design concept by Don Moerson</span>
                                                      <span class="lang2">Yellow/blue design concept by Don Moerson</span>
                                                      </a>
                                                   </h5>
                                                   <time class="recent-posts-time">Jan 18, 2018</time><a class="recent-posts-comment" href="blogs/news/yellow-blue-design-concept-by-don-moerson/comments.html" data-translate="blogs.comments.comments_with_count|count:0">Counts</a>
                                                </div>
                                             </li>
                                             <li>
                                                <a class="recent-posts-thumbnail" href="blogs/news/modular-seating-and-table-system.html"><img class="attachment-large sp-post-image " src="image/blog-17_76435ddd-e60f-4698-ab59-c48cd036292e_105x84_crop_centerc12a.jpg?v=1516256701" width="75" /></a>
                                                <div class="recent-posts-info">
                                                   <h5 class="entry-title">
                                                      <a href="blogs/news/modular-seating-and-table-system.html">
                                                      <span class="lang1">Modular seating and table system</span>
                                                      <span class="lang2">Modular seating and table system</span>
                                                      </a>
                                                   </h5>
                                                   <time class="recent-posts-time">Jan 18, 2018</time><a class="recent-posts-comment" href="blogs/news/modular-seating-and-table-system/comments.html" data-translate="blogs.comments.comments_with_count|count:0">Counts</a>
                                                </div>
                                             </li>
                                             <li>
                                                <a class="recent-posts-thumbnail" href="blogs/news/5-design-trends-in-furniture-this-season.html"><img class="attachment-large sp-post-image " src="" width="75" /></a>
                                                <div class="recent-posts-info">
                                                   <h5 class="entry-title">
                                                      <a href="blogs/news/5-design-trends-in-furniture-this-season.html">
                                                      <span class="lang1">5 design trends in furniture this season</span>
                                                      <span class="lang2">5 design trends in furniture this season</span>
                                                      </a>
                                                   </h5>
                                                   <time class="recent-posts-time">Jan 18, 2018</time><a class="recent-posts-comment" href="blogs/news/5-design-trends-in-furniture-this-season/comments.html" data-translate="blogs.comments.comments_with_count|count:0">Counts</a>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <style type="text/css" data-type="vc_shortcodes-custom-css">
                        .vc_custom_1482224730326 {
                        padding-top: 5px !important;
                        padding-bottom: 5px !important
                        }
                        .vc_custom_1501507744264 {
                        margin-right: -60px !important
                        }
                        .vc_custom_1501507751857 {
                        margin-right: -90px !important;
                        padding-left: 60px !important
                        }
                        .vc_custom_1498552559778 {
                        margin-top: -35px !important;
                        margin-right: -20px !important;
                        margin-bottom: -5px !important;
                        margin-left: 90px !important;
                        border-left-width: 1px !important;
                        padding-right: 30px !important;
                        padding-left: 30px !important;
                        background-color: rgba(0, 0, 0, 0.02) !important;
                        *background-color: rgb(0, 0, 0) !important;
                        border-left-color: rgba(0, 0, 0, 0.05) !important;
                        border-left-style: solid !important
                        }
                     </style>
                  </div>
               </div>
               <style type="text/css">
                  .menu-item-1515560575324 > .sub-menu-dropdown {
                  min-height: 120px;
                  width: 800px;
                  }
               </style>
            </li> --}}
            {{--
            <li id="menu-item-1519368597929" class="menu-item menu-item-type-post_type menu-item-pages menu-item-1519368597929 menu-item-design-sized menu-mega-dropdown item-level-0 item-event-hover menu-item-has-children with-offsets">
               <a href="#" class="woodmart-nav-link"><span>
               <span class="lang1">pages</span>
               <span class="lang2">pages</span>
               </span></a>
               <div class="sub-menu-dropdown color-scheme-dark">
                  <div class="container">
                     <div class="vc_section vc_custom_1482224730326">
                        <div class="vc_row wpb_row vc_row-fluid vc_row-o-content-top vc_row-flex">
                           <div class="wpb_column vc_column_container vc_col-sm-6">
                              <div class="vc_column-inner">
                                 <div class="wpb_wrapper">
                                    <ul class="sub-menu mega-menu-list">
                                       <li>
                                          <a href="#">
                                          <span>
                                          <span class="lang1">Page</span>
                                          <span class="lang2">Page</span>
                                          </span>
                                          </a>
                                          <ul class="sub-sub-menu">
                                             <li>
                                                <a href="pages/faq.html">
                                                <span>
                                                <span class="lang1">FaQs</span>
                                                <span class="lang2">FaQs</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="pages/about-me.html">
                                                <span>
                                                <span class="lang1">About Me</span>
                                                <span class="lang2">About Me</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="pages/contact-us.html">
                                                <span>
                                                <span class="lang1">Contact Us</span>
                                                <span class="lang2">Contact Us</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="pages/landing-page.html">
                                                <span>
                                                <span class="lang1">Landing Page</span>
                                                <span class="lang2">Landing Page</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="index6bcf.html?preview_theme_id=31817760810">
                                                <span>
                                                <span class="lang1">Layout Boxed</span>
                                                <span class="lang2">Layout Boxed</span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="wpb_column vc_column_container vc_col-sm-6">
                              <div class="vc_column-inner">
                                 <div class="wpb_wrapper">
                                    <ul class="sub-menu mega-menu-list">
                                       <li>
                                          <a href="#">
                                          <span>
                                          <span class="lang1">Header</span>
                                          <span class="lang2">Header</span>
                                          </span>
                                          </a>
                                          <ul class="sub-sub-menu">
                                             <li>
                                                <a href="collections/shop/index3c49.html?preview_theme_id=31817400362">
                                                <span>
                                                <span class="lang1">Advanced</span>
                                                <span class="lang2">Advanced</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/indexbaf6.html?preview_theme_id=31817662506">
                                                <span>
                                                <span class="lang1">E-Commerce</span>
                                                <span class="lang2">E-Commerce</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/indexcb03.html?preview_theme_id=32546324522">
                                                <span>
                                                <span class="lang1">Header base</span>
                                                <span class="lang2">Header base</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/indexa428.html?preview_theme_id=31817891882">
                                                <span>
                                                <span class="lang1">Simplified</span>
                                                <span class="lang2">Simplified</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/index5d67.html?preview_theme_id=31817990186">
                                                <span>
                                                <span class="lang1">Double menu</span>
                                                <span class="lang2">Double menu</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/index1e2a.html?preview_theme_id=31817269290">
                                                <span>
                                                <span class="lang1">Logo center</span>
                                                <span class="lang2">Logo center</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/index6bcf.html?preview_theme_id=31817760810">
                                                <span>
                                                <span class="lang1">With categories menu</span>
                                                <span class="lang2">With categories menu</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/indexa088.html?preview_theme_id=31816712234">
                                                <span>
                                                <span class="lang1">Menu in top bar</span>
                                                <span class="lang2">Menu in top bar</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="collections/shop/indexf1f3.html?preview_theme_id=31826444330">
                                                <span>
                                                <span class="lang1">Dark header</span>
                                                <span class="lang2">Dark header</span>
                                                </span>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#">
                                                <span>
                                                <span class="lang1">Colored header</span>
                                                <span class="lang2">Colored header</span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <style type="text/css" data-type="vc_shortcodes-custom-css">
                        .vc_custom_1482224730326 {
                        padding-top: 5px !important;
                        padding-bottom: 5px !important
                        }
                     </style>
                  </div>
               </div>
               <style type="text/css">
                  .menu-item-1519368597929 > .sub-menu-dropdown {
                  min-height: 120px;
                  width: 400px;
                  }
               </style>
            </li>
            <li id="menu-item-1519591743936" class="menu-item menu-item-type-custom menu-item-buy item-level-0 menu-item-1519591743936 menu-item-no-children with-offsets">
               <a href="#" class="woodmart-nav-link"><span>
               <span class="lang1">Buy</span>
               <span class="lang2">Buy</span>
               </span></a>
               <style type="text/css"></style>
            </li> --}}
            @endif
            @endforeach
         </ul>
         {{-- <style type="text/css">
            .menu-label.menu-label-hot {
            background-color: #83b735
            }
            .menu-label.menu-label-hot:before {
            border-color: #83b735
            }
            .menu-label.menu-label-effects {
            background-color: #fbbc34
            }
            .menu-label.menu-label-effects:before {
            border-color: #fbbc34
            }
            .menu-label.menu-label-unlimited {
            background-color: #d41212
            }
            .menu-label.menu-label-unlimited:before {
            border-color: #d41212
            }
            .menu-label.menu-label-best {
            background-color: #d41212
            }
            .menu-label.menu-label-best:before {
            border-color: #d41212
            }
            .menu-label.menu-label-feature {
            background-color: #d41212
            }
            .menu-label.menu-label-feature:before {
            border-color: #d41212
            }
         </style> --}}
      </div>
   </div>
</div>