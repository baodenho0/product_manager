@extends('customer.layouts.master')
@section('title','Collections')
@section('customCSS')
<link rel="stylesheet" href="css/paginate.css">

@endsection
@section('content')

<div class="main-page-wrapper">
  <div class="container">
    <div class="row content-layout-wrapper">
      <div class="site-content content-with-products col-sm-9 col-sm-push-3">
         
      {{--  <div class="term-description"><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12 vc_hidden-xs"><div class="vc_column-inner "><div class="wpb_wrapper">		<div class="promo-banner-wrapper" id="banner-id-5a565d34195ed">
			<div class="promo-banner cursor-pointer banner-vr-align-middle banner-hr-align-left banner- banner-hover-zoom color-scheme-dark banner-btn-size-small banner-btn-style-3d  with-btn banner-btn-position-static" onclick="window.location.href='#'">

				<div class="main-wrapp-img">
					<div class="banner-image">
<img src="../../cdn.shopify.com/s/files/1/2576/3756/files/wood-furnit-cat-banner-sofa88aa.jpg?v=1513581279" alt="">																		</div>
				</div>

				<div class="wrapper-content-banner">
					<div class="content-banner text-left content-width-100 content-spacing-default">
							<div class="banner-title-wrap banner-title-default"></div>
													<div class="banner-inner content-size-default">
								
<div style="max-width: 250px;">
 <h4 style="font-size: 24px; margin-bottom: 8px;">VULUTATE DUIRA PARTURENT MIRA</h4>
<p class="hidden-xs hidden-sm">Suspedise ullamcorper dis nisl ipsu habitasse nam parturent fusce tique.</p>

</div>
							</div>
												<div class="banner-btn-wrapper"><div class="woodmart-button-wrapper text-left"><a href="#" title="" class="btn btn-color-primary btn-style-3d btn-size-small">SHOP NOW</a></div></div>					</div>
				</div>

			</div>
					</div>
		
		</div></div></div></div></div> --}}
        
        <div class="shop-loop-head">
          <div class="woodmart-shop-breadcrumbs"><nav class="shopify-breadcrumb">
  <a class="breadcrumb-link" href="../index.html" title="Back to the frontpage" data-translate="general.breadcrumbs.home">Home</a>
    
  <span class="breadcrumb-last"> 
    
    <span class="">{{$name}}</span>
    {{-- <span class="lang2">Furniture</span> --}}
     
  </span>  
   
</nav></div>
          <div class="woodmart-shop-tools"><!-- /snippets/collection-sorting-grid.liquid -->    
<div class="woodmart-show-sidebar-btn">
  <span class="woodmart-side-bar-icon"></span>
  <span data-translate="collections.sidebar.sidebar">Show sidebar</span>
</div>
{{-- <div class="woodmart-products-per-page">
  <span class="per-page-title" data-translate="collections.general.show">Show</span>
  <a href="furniture46ce.html?&amp;view=grid" data-page="grid" class="per-page-variation  current-variation"><span>15</span></a>
  <span class="per-page-border"></span>
  <a href="furniture2cfb.html?&amp;view=grid_22" data-page="grid_22" class="per-page-variation "><span>22</span></a>
  <span class="per-page-border"></span>
  <a href="furniture5fc4.html?&amp;view=grid_44" data-page="grid_44" class="per-page-variation "><span>44</span></a>
  <span class="per-page-border"></span>
  <a href="furniturece8f.html?&amp;view=grid_all" data-page="grid_all" class="per-page-variation "><span data-translate="collections.sorting.all">All</span></a>
</div> --}}
{{-- <div class="woodmart-products-shop-view products-view-grid_list"> 
  <a href="furniture4ddc.html?&amp;view=list" data-view="list" class="shop-view per-row-list">
    <svg version="1.1" id="list-view" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18" height="18" viewBox="0 0 18 18" enable-background="new 0 0 18 18" xml:space="preserve">
      <rect width="18" height="2"></rect>
      <rect y="16" width="18" height="2"></rect>
      <rect y="8" width="18" height="2"></rect>
    </svg>
  </a> 
  <a href="furniture46ce.html?&amp;view=grid" data-view="grid" class="per-row-2 shop-view current-variation">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
      <rect width="5" height="5"></rect>
      <rect x="7" width="5" height="5"></rect>
      <rect x="14" width="5" height="5"></rect>
      <rect y="7" width="5" height="5"></rect>
      <rect x="7" y="7" width="5" height="5"></rect>
      <rect x="14" y="7" width="5" height="5"></rect>
      <rect y="14" width="5" height="5"></rect>
      <rect x="7" y="14" width="5" height="5"></rect>
      <rect x="14" y="14" width="5" height="5"></rect>
    </svg>
  </a>  
</div> --}}

{{-- <div class="shopify-ordering">
  <div class="sort-by">
    <div class="select-new">
      <div class="select-inner">
        <form method="get" action="https://woodmart-default.myshopify.com/furniture"><select name="sort_by" class="orderby">
            <option data-value="/furniture?&sort_by=manual" value="manual" data-translate="collections.sorting.featured">Featured</option>
            <option data-value="/furniture?&sort_by=best-selling" value="best-selling" data-translate="collections.sorting.best_selling">Best Selling</option>
            <option data-value="/furniture?&sort_by=title-ascending" value="title-ascending" data-translate="collections.sorting.az">Name, A-Z</option>
            <option data-value="/furniture?&sort_by=title-descending" value="title-descending" data-translate="collections.sorting.za">Name, Z-A</option>
            <option data-value="/furniture?&sort_by=price-ascending" value="price-ascending" data-translate="collections.sorting.price_ascending">Price, low to high</option>
            <option data-value="/furniture?&sort_by=price-descending" value="price-descending" selected="selected" data-translate="collections.sorting.price_descending">Price, high to low</option>
            <option data-value="/furniture?&sort_by=created-descending" value="created-descending" data-translate="collections.sorting.date_descending">Date, new to old</option>
            <option data-value="/furniture?&sort_by=created-ascending" value="created-ascending" data-translate="collections.sorting.date_ascending">Date, old to new</option>
          </select> 
        </form>
      </div>
    </div>
  </div>
</div> --}}


</div>
        </div>
       	
        <div class="woodmart-active-filters">
          <div class="widget widget_layered_nav_filters">
  <ul></ul>
</div>
        </div>
        <div class="woodmart-shop-loader hidden-loader hidden-from-top"></div>
        
        <div class="products elements-grid woodmart-products-holder woodmart-spacing-20 products-spacing-20 pagination-pagination row grid-columns-3 " data-paged="1">
	{{-- cat o day --}}
@foreach ($products as $p)
	
	<div class="product-grid-item product has-stars purchasable woodmart-hover-base quick-shop-on product-type-variable  product-with-swatches col-xs-6 col-sm-4 col-md-4 type-product status-publish has-post-thumbnail first instock sale hover-width-small hover-ready" data-loop="1" data-id="9791703056426">
  <div class="content-product-imagin"></div>

  <div class="product-element-top"><a href="/{{str_slug($name)}}/{{$p->slug}}" class="product-image-link"><img src="../assets/upload/product/{{$p->image}}" class="attachment-shop_catalog size-shop_catalog" alt="{{$p->name}}">
</a>

<div class="hover-img">
  <a href="/{{str_slug($name)}}/{{$p->slug}}">
    <img src="../assets/upload/product/{{$p->image}}" class="attachment-shop_catalog size-shop_catalog" alt="">
  </a>
</div>
 {{-- <div class="wrapp-swatches"><div class="swatches-on-grid">
  
  
  
  
  
  
  
   
  
  <div class="swatch-on-grid woodmart-tooltip swatch-has-image swatch-size-default" style="background-image: url(../../cdn.shopify.com/s/files/1/2576/3756/t/60/assets/red6512.png?11)" data-image-src="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10-2_290x290_crop_center.jpg?v=1516200422" data-original-title="" title="">
  Red
  </div>
  
  
  
  
  
  
   
  
  <div class="swatch-on-grid woodmart-tooltip swatch-has-image swatch-size-default" style="background-image: url(../../cdn.shopify.com/s/files/1/2576/3756/t/60/assets/yellow6512.png?11)" data-image-src="//cdn.shopify.com/s/files/1/2576/3756/products/product-furniture-10_1_290x290_crop_center.jpg?v=1516200417" data-original-title="" title="">
  Yellow
  </div>
  
  
  
  
  
  
  
</div>
      <div class="product-compare-button">
        <a href="javascript:;" data-product-handle="grand-comfort-chair" data-product-title="Grand comfort chair" class="compare button"><span data-translate="compare_list.general.add_to_compare">Add to compare</span></a>
      </div> 
      
    </div> --}}
    <div class="quick-shop-wrapper">
      <div class="quick-shop-close"><span data-translate="collections.general.close">Close</span></div>
      <div class="quick-shop-form"></div>
    </div></div> 

  <div class="product-information">
    <h3 class="product-title">
      <a href="furniture/products/grand-comfort-chair.html">
        
        <span class="">{{$p->name}}</span>
        {{-- <span class="lang2">Grand comfort chair</span> --}}
        
      </a>
    </h3>{{-- <div class="woodmart-product-cats"><a href="furniture.html" title="">Furniture</a>,&nbsp;<a href="shop.html" title="">Shop</a></div> --}}<div class="product-rating-price">
      <div class="wrapp-product-price"> 
        <div class="star-rating">
          <span class="shopify-product-reviews-badge" data-id="790550872106"></span>
        </div>
        <span class="price">
          
          <span class="shopify-Price-amount amount"><span class="money">{{number_format($p->price)}}đ</span></span>
          
        </span>
      </div>
    </div>  
    <div class="fade-in-block">
      <div class="hover-content">
        <div class="hover-content-inner"><div class="">{{$p->description}}</div>
          {{-- <div class="lang2">Placerat tempor dolor eu leo ullamcorper et magnis habitant ultrices consectetur arcu nulla mattis fermentum adipiscing a et bibendum sed platea malesuada eget vestibulum.</div> --}}</div>
      </div>
      <div class="woodmart-buttons">
        
        <div class="wrap-wishlist-button">
          <a href="javascript:;" data-product-handle="grand-comfort-chair" data-product-title="Grand comfort chair" class="add_to_wishlist" title="Add to wishlist"><span data-translate="wish_list.general.add_to_wishlist">Add to wishlist</span></a>
          <div class="clear"></div>
        </div>
        
        <div class="woodmart-add-btn" ><a id="{{$p->id}}" data-image="{{$p->image}}" class="add_to_cart button product_type_variable  add-to-cart-loop">  
            <span data-translate="products.product.select_options">Select Options</span>
          </a></div>
        
        <div class="wrap-quickview-button">
          <div class="quick-view">
            <a href="../products/grand-comfort-chair95b3.html?view=quickview" class="quickview-icon quickview open-quick-view woodmart-tltp">
              <span data-translate="collections.general.quickview">Quick View</span>
            </a> 
          </div>
        </div>
        
      </div>
    </div>
  </div> 
</div>

@endforeach
     {{-- cat o day --}}
{{--  --}}
{{-- cat-/-/-/-/-/-/-//-/-/-/-/-/-/-/-/-/-/-/-/-/-//- --}}

<div class="clearfix visible-sm-block"></div><div class="clearfix visible-md-block visible-lg-block"></div></div>
        <div class="products-footer">
          <div class="shopify-pagination">
          	{{$products->links()}}
 {{--  <ul class="page-numbers">
     
    
    
    
    <li class="active"><span class="page-numbers current">1</span></li>
    
    
    
    
    <li>
      <a class="page-numbers" href="furniture4658.html?page=2">2</a>
    </li>
    
    
    
    <li>
      <a class="page-numbers" href="furniture9ba9.html?page=3">3</a>
    </li>
    
    
    
    
    <li><span class="page-numbers">&hellip;</span></li>
    
    
    
    
    <li>
      <a class="page-numbers" href="furnitureaf4d.html?page=5">5</a>
    </li>
    
     
    
    <li>
      <a class="next page-numbers" href="furniture4658.html?page=2" title="Next"  data-translate="collections.general.next" translate-item="title">→</a>
    </li> 
    
  </ul>  --}}
</div>
        </div>
      </div>
      
      <div class="sidebar-container col-sm-3 col-sm-pull-9 sidebar-left area-sidebar-shop">
        <div class="woodmart-close-sidebar-btn"><span>Close</span></div>
        <div class="sidebar-inner woodmart-sidebar-scroll">
          <div class="widget-area woodmart-sidebar-content">
            
<div class="block block-nav sidebar-cate-toogle sidebar-widget">
  <div class="widget-title">
    <span data-translate="collections.sidebar.categories">Categories</span>
  </div>
  <div class="sidebar-content block-content">
     
<ul id="categories_nav" class="nav-accordion nav-categories">
  
    
  @foreach ($menu_dropdown as $mn_d)

  <li class="level0 level-top ">
    <a href="/{{$mn_d->slug}}" class="level-top"> 
      
      <span class="">{{$mn_d->name}}</span>
      
    </a>
  </li>
  @endforeach
  
    
  
  
</ul>
  </div>
</div>





          </div>
        </div>
      </div>
      
    </div>
  </div>



@endsection
@section('customJS')
<script src="assets/customJS.js" type="text/javascript"></script>
@endsection