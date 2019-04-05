<!doctype html>
 <html class="no-js"> 


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head> 
  <!-- Basic page needs ================================================== -->
  <meta charset="utf-8">  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
  <base href="{{ asset('assets_customer') }}/">
  <link rel="shortcut icon" href="#" type="image/png" /> 
  
  
  <title>@yield('title')</title>
  
  

  

  <!-- Helpers ================================================== -->
  <!-- /snippets/social-meta-tags.liquid -->


  <meta property="og:type" content="website">
  <meta property="og:title" content="Woodmart - Default">
  


  <meta property="og:url" content="index.html">
  <meta property="og:site_name" content="Woodmart Default">





<meta name="twitter:card" content="summary">


  <link rel="canonical" href="index.html"> 
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  
  <meta name="theme-color" content="">
  <link href="css/bootstrap.min.css" rel="stylesheet"  />
  <!-- CSS ==================================================+ -->
  
  <link href="css/woodmart6512.css" rel="stylesheet" type="text/css" media="all" /> 
  <link href="css/font-awesome.min6512.css" rel="stylesheet" type="text/css" media="all" /> 
  <link href="css/owl.carousel.min6512.css" rel="stylesheet" type="text/css" media="all" /> 
  <link href="css/magnific-popup6512.css" rel="stylesheet" type="text/css" media="all" /> 
  <link href="css/styles.scss.css" rel="stylesheet" type="text/css" media="all" /> 
  <link href="css/photoswipe6512.css" rel="stylesheet" type="text/css" media="all" /> 
   
  <link href="css/animate6512.css" rel="stylesheet" type="text/css" media="all" /> 
  <link href="css/color-config.scss6512.css" rel="stylesheet" type="text/css" media="all" /> 
  <!-- Header hook for plugins ================================================== -->
  <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/25763756/digital_wallets/dialog">



 
  <script src="assets/vendor6512.js?11" type="text/javascript"></script>
  <script src="assets/bootstrap.min.js?11" type="text/javascript"></script> 
  
  
  <link href="fonts.googleapis.com/cssd409.css?family=Lato:300italic,400italic,500italic,600italic,700italic,800italic,700,300,600,800,400,500&amp;subset=cyrillic-ext,greek-ext,latin,latin-ext,cyrillic,greek,vietnamese" rel='stylesheet' type='text/css'>
  
  
  <link href="fonts.googleapis.com/csscac6.css?family=Poppins:300italic,400italic,500italic,600italic,700italic,800italic,700,300,600,800,400,500&amp;subset=cyrillic-ext,greek-ext,latin,latin-ext,cyrillic,greek,vietnamese" rel='stylesheet' type='text/css'>
  
  
  <link href="fonts.googleapis.com/csscac6.css?family=Poppins:300italic,400italic,500italic,600italic,700italic,800italic,700,300,600,800,400,500&amp;subset=cyrillic-ext,greek-ext,latin,latin-ext,cyrillic,greek,vietnamese" rel='stylesheet' type='text/css'>
  
  
  <link href="fonts.googleapis.com/csscac6.css?family=Poppins:300italic,400italic,500italic,600italic,700italic,800italic,700,300,600,800,400,500&amp;subset=cyrillic-ext,greek-ext,latin,latin-ext,cyrillic,greek,vietnamese" rel='stylesheet' type='text/css'>
  
  
  <link href="fonts.googleapis.com/csscac6.css?family=Poppins:300italic,400italic,500italic,600italic,700italic,800italic,700,300,600,800,400,500&amp;subset=cyrillic-ext,greek-ext,latin,latin-ext,cyrillic,greek,vietnamese" rel='stylesheet' type='text/css'>
  
  
  <link href="fonts.googleapis.com/cssd409.css?family=Lato:300italic,400italic,500italic,600italic,700italic,800italic,700,300,600,800,400,500&amp;subset=cyrillic-ext,greek-ext,latin,latin-ext,cyrillic,greek,vietnamese" rel='stylesheet' type='text/css'>
  

<script>
  var translator = {
    current_lang : jQuery.cookie("language"),
    init: function() {
      translator.updateStyling();  
      translator.updateLangSwitcher();
    },
    updateStyling: function() {
        var style;
        if (translator.isLang2()) {
          style = "<style>*[data-translate] {visibility:hidden} .lang1 {display:none}</style>";          
        } else {
          style = "<style>*[data-translate] {visibility:visible} .lang2 {display:none}</style>";
        }
        jQuery('head').append(style);
    },
    updateLangSwitcher: function() { 
      if (translator.isLang2()) {
        jQuery(".menu-item-type-language .woodmart-nav-link").removeClass('active');
        jQuery(".menu-item-type-language .woodmart-nav-link.lang-2").addClass("active");
      }
    },
    getTextToTranslate: function(selector) {
      var result = window.lang2;
      var params;
      if (selector.indexOf("|") > 0) {
        var devideList = selector.split("|");
        selector = devideList[0];
        params = devideList[1].split(",");
      }

      var selectorArr = selector.split('.');
      if (selectorArr) {
        for (var i = 0; i < selectorArr.length; i++) {
            result = result[selectorArr[i]];
        }
      } else {
        result = result[selector];
      }
      if (result && result.one && result.other) {
        var countEqual1 = true;
        for (var i = 0; i < params.length; i++) {
          if (params[i].indexOf("count") >= 0) {
            variables = params[i].split(":");
            if (variables.length>1) {
              var count = variables[1];
              if (count > 1) {
                countEqual1 = false;
              }
            }
          }
        } 
        if (countEqual1) {
          result = result.one;
        } else {
          result = result.other;
        }
      } 
      
      if (params && params.length>0) {
       {{-- result = result.replace(/{{\s*/g, "{{");
        result = result.replace(/\s*}}/g, "}}"); --}}
        for (var i = 0; i < params.length; i++) {
          variables = params[i].split(":");
          if (variables.length>1) {
            result = result.replace("{{"+variables[0]+"}}", variables[1]);
          }          
        }
      }
      

      return result;
    },
    isLang2: function() {
      return translator.current_lang && translator.current_lang == 2;
    }, 
    doTranslate: function(blockSelector) {
      if (translator.isLang2()) {
        jQuery(blockSelector + " [data-translate]").each(function(e) {          
          var item = jQuery(this);
          var selector = item.attr("data-translate");
          var text = translator.getTextToTranslate(selector); 
          if (item.attr("translate-item")) {
            var attribute = item.attr("translate-item");
            if (attribute == 'blog-date-author') {
              item.html(text);
            } else if (attribute!="") {            
              item.attr(attribute,text);
            }
          } else if (item.is("input")) { 
            if(item.is("input[type=search]")){
              item.attr("placeholder", text);
            }else{
              item.val(text);
            }
            
          } else {
            item.text(text);
          }
          item.css("visibility","visible");
        });
      }
    }   
  };
  translator.init(); 
  jQuery(document).ready(function() {     
    jQuery('.select-language a').on('click', function(){ 
      var value = jQuery(this).data('lang');
      jQuery.cookie('language', value, {expires:10, path:'/'});
      location.reload();
    });
    translator.doTranslate("body");
  });
</script>
  <style>
    
    .single-product-content .product-options .selector-wrapper {
      display: none;
    }
     
    .sale_notification_default .wrapper-noti .bkt--brand {display: none !important;}
    
  </style>  
</head>
<body id="woodmart-default" class="page-template-default wrapper-full-width   menu-style- woodmart-ajax-shop-on  template-index  woodmart-top-bar-on  menu-style-default offcanvas-sidebar-mobile offcanvas-sidebar-tablet  woodmart-light btns-shop-light btns-accent-hover-light btns-accent-light btns-shop-hover-light btns-accent-3d  btns-shop-3d  enable-sticky-header sticky-header-clone global-search-full-screen woodmart-header-base    "> 
  <!-- begin site-header -->
    @include('customer.layouts.header')
    <!-- //site-header -->  
    @yield('content')
    
    <!-- begin site-footer --> 
    @include('customer.layouts.footer')
  <!-- //site-footer --> 
   
<div style="display: none">
  <img src="#" style="display:none;"/>
  <style> 
    .woodmart-promo-popup {
      
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center center;
      
      
      max-width: 800px;
      display: none;
    } 
    .vc_custom_1488916869269 {
      margin-top: -15px !important;
      margin-bottom: -15px !important;
      border-top-width: 5px !important;
      border-right-width: 5px !important;
      border-bottom-width: 5px !important;
      border-left-width: 5px !important;
      padding-top: 70px !important;
      padding-bottom: 70px !important;
      border-left-color: rgba(255,255,255,0.15) !important;
      border-left-style: solid !important;
      border-right-color: rgba(255,255,255,0.15) !important;
      border-right-style: solid !important;
      border-top-color: rgba(255,255,255,0.15) !important;
      border-top-style: solid !important;
      border-bottom-color: rgba(255,255,255,0.15) !important;
      border-bottom-style: solid !important;
    }
    .vc_custom_1488917450837 {
      padding-top: 0px !important;
    }
    .vc_custom_1488914753181 {
      margin-bottom: 0px !important;
    }
    .vc_custom_1488915083694 {
      margin-bottom: 0px !important;
    }
    
  </style> 
  
  <div class="mfp-with-anim woodmart-promo-popup" style="background-image:url(image/newsletter_bg_image6512.jpg?11);">
    <div class="woodmart-popup-inner">
      <div class="vc_row wpb_row vc_row-fluid vc_custom_1488916869269 vc_row-has-fill">
        <div class="wpb_animate_when_almost_visible wpb_fadeIn fadeIn wpb_column vc_column_container vc_col-sm-12 color-scheme-light wpb_start_animation animated">
          <div class="vc_column-inner vc_custom_1488917450837">
            <div class="wpb_wrapper">
              <div id="woodmart-title-id-5a5dc313f20e6" class="title-wrapper  woodmart-title-color-white woodmart-title-style-default woodmart-title-size-large woodmart-title-width-70 text-center ">
                <div class="liner-continer">
                  <span class="left-line"></span>
                  <h4 class="woodmart-title-container title  woodmart-font-weight-">
                    
                    <span class="lang1">HEY YOU, SIGN UP AND CONNECT TO WOODMART!</span>
                    <span class="lang2">HEY YOU, SIGN UP AND CONNECT TO WOODMART!</span>
                    
                  </h4>
                  <span class="right-line"></span>
                </div>
                <div class="title-after_title">
                  
                  <span class="lang1">Be the first to learn about our latest trends and get exclusive offers</span>
                  <span class="lang2">Be the first to learn about our latest trends and get exclusive offers</span>
                  
                </div>
              </div>
              <div class="wpb_text_column wpb_content_element vc_custom_1488914753181">
                <div class="wpb_wrapper">
                  
                  <form action="http://icotheme.us11.list-manage.com/subscribe/post?u=839a8516827cd03ef09d2233b&amp;id=89adf86d59" method="post" target="_blank" class="mc4wp-form" name="mc-embedded-subscribe-form">
                    <div class="mc4wp-form-fields"> 
                      <p><input id="mc-email" type="email" value="" name="EMAIL" placeholder="Email Address" class="input-group-field input-text" aria-label="Email Address"></p>
                      <p style="margin-bottom: 20px;"><input type="submit" class="btn-button effect" name="subscribe" data-translate="general.newsletter_form.go" value="Go!"></p>       
                    </div> 
                  </form>
                </div>
              </div><div class="wpb_text_column wpb_content_element  vc_custom_1488915083694">
                <div class="wpb_wrapper">
                  
                  <div class="lang1"><p style="text-align: center;">Will be used in accordance with our <strong><a href="#">Privacy Policy</a></strong></p></div>
                  <div class="lang2"><p style="text-align: center;">Will be used in accordance with our <strong><a href="#">Privacy Policy</a></strong></p></div>
                   
                </div>
              </div></div>
          </div>
        </div>
      </div>
      <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1488916869269{margin-top:-15px !important;margin-bottom:-15px !important;border-top-width:5px !important;border-right-width:5px !important;border-bottom-width:5px !important;border-left-width:5px !important;padding-top:70px !important;padding-bottom:70px !important;border-left-color:rgba(255,255,255,0.15) !important;border-left-style:solid !important;border-right-color:rgba(255,255,255,0.15) !important;border-right-style:solid !important;border-top-color:rgba(255,255,255,0.15) !important;border-top-style:solid !important;border-bottom-color:rgba(255,255,255,0.15) !important;border-bottom-style:solid !important}.vc_custom_1488917450837{padding-top:0px !important}.vc_custom_1488914753181{margin-bottom:0px !important}.vc_custom_1488915083694{margin-bottom:0px !important}</style>
    </div>
  </div>
</div> 
 <a href="#" class="scrollToTop">Scroll To Top</a>

 <script type="text/javascript">
    var woodmart_settings = {};
    woodmart_settings.enableCurrency = true;
    woodmart_settings.ajax_cart_enable = true;
    woodmart_settings.header_banner_version = '1';
    woodmart_settings.header_banner_close_btn = false;
    woodmart_settings.header_banner_enabled = false;
    woodmart_settings.product_media = {};
    woodmart_settings.cart_data = {};
    woodmart_settings.cart_data.shoping_cart_action = 'widget';
    woodmart_settings.product_data = {};
    woodmart_settings.wishlist_data = {}; 
    woodmart_settings.compare_data = {};
    woodmart_settings.search = {};
    woodmart_settings.search.ajax_search = true;
    woodmart_settings.search.search_by_collection = true;
    woodmart_settings.newsletter_enable = '1';
    woodmart_settings.newsletter_show_after = 'time';
    woodmart_settings.newsletter_hidden_mobile = true;
    woodmart_settings.newsletter_time_delay = 5000;
    woodmart_settings.newsletter_scroll_delay = 700;
    woodmart_settings.newsletter_on_page = '0';
    
    woodmart_settings.product_data.product_swatch_setting = 1;
    if (multi_language && translator.isLang2()) {
      woodmart_settings.product_data.share_fb = window.lang2.products.product.share_fb;
      woodmart_settings.product_data.tweet = window.lang2.products.product.share_tweet;
      woodmart_settings.product_data.pin_it = window.lang2.products.product.share_pin_it;
      woodmart_settings.product_data.download_image = window.lang2.products.product.share_download;
    }else{ 
      woodmart_settings.product_data.share_fb = 'Facebook';
      woodmart_settings.product_data.tweet = 'Twitter';
      woodmart_settings.product_data.pin_it = 'Pinit';
      woodmart_settings.product_data.download_image = 'Download';
    }
    if (multi_language && translator.isLang2()) {
      woodmart_settings.product_data.in_stock = window.lang2.products.product.in_stock;
      woodmart_settings.product_data.out_of_stock = window.lang2.products.product.out_of_stock;
      woodmart_settings.product_data.add_to_cart = window.lang2.products.product.add_to_cart;
      woodmart_settings.product_data.sold_out = window.lang2.products.product.sold_out;
      woodmart_settings.product_data.sku_na = window.lang2.products.product.sku_na;
      woodmart_settings.cart_data.totalNumb = window.lang2.cart.header.total_numb;
      woodmart_settings.cart_data.buttonViewCart = window.lang2.cart.header.view_cart;
      woodmart_settings.cart_data.continueShop = window.lang2.cart.header.continue_shopping;
      woodmart_settings.cart_data.addedCart = window.lang2.cart.header.added_cart;
      window.inventory_text = {
        in_stock: window.lang2.products.product.in_stock,
        many_in_stock: window.lang2.products.product.many_in_stock,
        out_of_stock: window.lang2.products.product.out_of_stock,
        add_to_cart: window.lang2.products.product.add_to_cart,
        sold_out: window.lang2.products.product.sold_out
      };
      window.date_text = {
        year_text: window.lang2.general.date.year_text,
        month_text: window.lang2.general.date.month_text,
        week_text: window.lang2.general.date.week_text,
        day_text: window.lang2.general.date.day_text,
        year_singular_text: window.lang2.general.date.year_singular_text,
        month_singular_text: window.lang2.general.date.month_singular_text,
        week_singular_text: window.lang2.general.date.week_singular_text,
        day_singular_text: window.lang2.general.date.day_singular_text,
        hour_text: window.lang2.general.date.hour_text,
        min_text: window.lang2.general.date.min_text,
        sec_text: window.lang2.general.date.sec_text,
        hour_singular_text: window.lang2.general.date.hour_singular_text,
        min_singular_text: window.lang2.general.date.min_singular_text,
        sec_singular_text: window.lang2.general.date.sec_singular_text
      };
      woodmart_settings.wishlist_data.wishlist = window.lang2.wish_list.general.wishlist;
      woodmart_settings.wishlist_data.product = window.lang2.wish_list.general.product;
      woodmart_settings.wishlist_data.quantity = window.lang2.wish_list.general.quantity;
      woodmart_settings.wishlist_data.options = window.lang2.wish_list.general.options;
      woodmart_settings.wishlist_data.remove = window.lang2.wish_list.general.remove;
      woodmart_settings.wishlist_data.no_item = window.lang2.wish_list.general.no_item;
      woodmart_settings.wishlist_data.item_exist = window.lang2.wish_list.general.item_exist;
      woodmart_settings.wishlist_data.item_added = window.lang2.wish_list.general.item_added;
      woodmart_settings.compare_data.compare = window.lang2.compare_list.general.wishlist;
      woodmart_settings.compare_data.product = window.lang2.compare_list.general.product;
      woodmart_settings.compare_data.quantity = window.lang2.compare_list.general.quantity;
      woodmart_settings.compare_data.options = window.lang2.compare_list.general.options;
      woodmart_settings.compare_data.remove = window.lang2.compare_list.general.remove;
      woodmart_settings.compare_data.no_item = window.lang2.compare_list.general.no_item;
      woodmart_settings.compare_data.item_exist = window.lang2.compare_list.general.item_exist;
      woodmart_settings.compare_data.item_added = window.lang2.compare_list.general.item_added;
      woodmart_settings.login_btn_text = window.lang2.customer.login.submit;
      woodmart_settings.register_btn_text = window.lang2.customer.register.submit;
    }else{ 
      woodmart_settings.product_data.in_stock = 'In Stock';
      woodmart_settings.product_data.out_of_stock = 'Out Of Stock';
      woodmart_settings.product_data.add_to_cart = 'Add to Cart';
      woodmart_settings.product_data.sold_out = 'Sold Out';
      woodmart_settings.product_data.sku_na = 'N/A';
      woodmart_settings.cart_data.totalNumb = 'item(s)';
      woodmart_settings.cart_data.buttonViewCart = 'View cart';
      woodmart_settings.cart_data.continueShop = 'Continue shopping'; 
      woodmart_settings.cart_data.addedCart = 'Product was successfully added to your cart.';
      window.inventory_text = {
        in_stock: "In Stock",
        many_in_stock: "Many In Stock",
        out_of_stock: "Out Of Stock",
        add_to_cart: "Add to Cart",
        sold_out: "Sold Out"
      }; 

      window.date_text = {
        year_text: "years",
        month_text: "months",
        week_text: "weeks",
        day_text: "days",
        year_singular_text: "year",
        month_singular_text: "month",
        week_singular_text: "week",
        day_singular_text: "day",
        hour_text: "Hr",
        min_text: "Min",
        sec_text: "Sc",
        hour_singular_text: "Hour",
        min_singular_text: "Min",
        sec_singular_text: "Sec"
      }; 
      woodmart_settings.wishlist_data.wishlist = 'Wishlist';
      woodmart_settings.wishlist_data.product = 'Product';
      woodmart_settings.wishlist_data.quantity = 'Quantity';
      woodmart_settings.wishlist_data.options = 'Options';
      woodmart_settings.wishlist_data.remove = 'has removed from wishlist';
      woodmart_settings.wishlist_data.no_item = 'There is no items in wishlist box';
      woodmart_settings.wishlist_data.item_exist = 'is exist in wishlist';
      woodmart_settings.wishlist_data.item_added = 'has added to wishlist successful';
      woodmart_settings.compare_data.compare = 'Comparing box';
      woodmart_settings.compare_data.product = 'Product';
      woodmart_settings.compare_data.quantity = 'Quantity';
      woodmart_settings.compare_data.options = 'Options';
      woodmart_settings.compare_data.remove = 'has removed from comparing box';
      woodmart_settings.compare_data.no_item = 'There is no items in comparing box';
      woodmart_settings.compare_data.item_exist = 'is exist in compare';
      woodmart_settings.compare_data.item_added = 'has added to comparing box successful'; 
      woodmart_settings.login_btn_text = 'Log in';
      woodmart_settings.register_btn_text = 'Register';
    }  
  </script> 
  
  
  <script src="assets/theme-scripts6512.js" type="text/javascript"></script>  
  <script src="assets/jquery.zoom.min6512.js" type="text/javascript"></script> 
  <script src="assets/photoswipe.min6512.js" type="text/javascript"></script>
     
  <script src="assets/option_selection6512.js" type="text/javascript"></script>  
  <script src="assets/theme6512.js" type="text/javascript"></script>
  <script src="assets/themes_support/api.jquery-e94e010e92e659b566dbc436fdfe5242764380e00398907a14955ba301a4749f.js" type="text/javascript"></script>
  

<script src="javascripts/currencies.js" type="text/javascript"></script>
<script src="assets/jquery.currencies.min6512.js" type="text/javascript"></script>

@yield('customJS')

  <div class="modal fade" id="wishlistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><span class="brackets" data-translate="wish_list.general.wishlist">Wishlist</span><span id="wishlistCount"></span></h4>
      </div>
      <div class="modal-body">
        <div id="wishlistAlert"></div>
        <div id="wishlistTableList">
          <table class="data-table cart-table" style="display:none;">
            <colgroup>
              <col>
              <col width="1">
              <col width="1">
              <col width="1">
              <col width="1">
              <col width="1">
            </colgroup>
            <thead>
              <tr class="first last">
                <th colspan="1">&nbsp;</th>
                <th colspan="2"><span class="nobr"><span class="brackets" data-translate="wish_list.general.product">Product</span></span></th>
                <th colspan="1" class="a-center"><span class="nobr"><span class="brackets" data-translate="wish_list.general.price">Price</span></span></th>
                <th colspan="2" class="a-center"><span class="brackets" data-translate="wish_list.general.quantity">Quantity</span></th>
                <th colspan="2" class="a-center product-options"><span class="brackets" data-translate="wish_list.general.options">Options</span></th>
                <th colspan="1" class="a-center last">&nbsp;</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div> 
<div id="wishlistModalBody" class="hide">
  <div class="form_cart">
    <table class="data-table cart-table"> 
      <tbody>
        <tr class="odd first last wishlist-option-item-0">
          <td colspan="1" class="product-image shoppingcart-image"><a class="product-image"><img src="#image#"></a></td>
          <td colspan="2" class="product-name shoppingcart-name"><h2 class="product-name"><a href="#urlProduct#">#title#</a> <!----></h2></td>
          <td colspan="1" class="a-right product-unittax"> 
            <span class="price">
              <del><span class="shopify-Price-amount amount"><span class="compare_at_price"></span></span></del> 
              <ins><span class="shopify-Price-amount amount">#price#</span></ins>
            </span>
          </td>
          <td colspan="2" class="a-center product-qty shoppingcart-qty"> 
            <div class="product-type-main product-view">
              <div class="product-options-bottom">
                <div class="add-to-cart-box">
                  <div class="input-box pull-left"> 
                    <div class="quantity">
                      <input type="button" value="-" class="minus increase" >
                      <input type="number" name="quantity" value="1" min="1" class="quantity-selector" size="4"> 
                      <input type="button" value="+" class="plus reduced" >
                    </div> 
                  </div>
                </div>
              </div>
            </div> 
          </td>
          <td colspan="2" class="product-options product-options-form"></td>
          <td colspan="1" class="a-center last">
            <a href="javascript:void(0)" class="remove-wishlist-form btn-remove" data-product-handle="#handle#" data-product-title="#title#"  >×</a>
            <a href="javascript:void(0)" class="add-cart-wishlist"><i class="icon-cart"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
  <div tabindex="-1" role="dialog" id="compareBox" class="modal fade">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><span class="brackets" data-translate="compare_list.general.compare">Comparing box</span><span id="compareCount"></span></h4>
      </div>
      <div class="modal-body">
        <div id="compareAlert"></div>
        <div id="compareTableList">
          <table class="data-table cart-table">
            <tbody>
              <tr>
                <td><span class="brackets" data-translate="compare_list.general.features">Features</span></td>
              </tr>
              <tr>
                <td><span class="brackets" data-translate="products.product.availability">Availability:</span></td>
              </tr>
              <tr>
                <td><span class="brackets" data-translate="compare_list.general.price">Price</span></td>
              </tr>
              <tr>
                <td><span class="brackets" data-translate="compare_list.general.options">Options</span></td>
              </tr>
              <tr>
                <td><span class="brackets" data-translate="compare_list.general.actions">Actions</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

    
</body>
</html>
