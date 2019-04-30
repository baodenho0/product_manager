<div class="site-content col-sm-12">
              <!-- /templates/index.liquid -->
<!-- BEGIN content_for_index --><div id="shopify-section-1516961703515" class="shopify-section"><div data-section-id="1516961703515" data-section-type="slideshow-section"> 
  <div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1516961703515 vc_row-has-fill woodmart-bg-center-center vc_row-no-padding woodmart-bg-left-top" style="margin-top:-40px; margin-bottom:50px;padding: ;"><div class="wpb_column vc_column_container vc_col-sm-12 ">
      <div class="vc_column-inner vc_custom_1496220809434">
        <div class="wpb_wrapper"><div class="slideshow-background slideshow-section">
            <div class="data-slideshow" data-auto="5000" data-paging="true" data-nav="true" data-transition="fade" data-loop="true" data-dots="true" style="display: none;"></div>
            <div id="slideshow-section-1516961703515" class="slideshow owl-carousel">
					
			   @foreach ($slide as $sl)	         	    
              <div class="item" style="background: url(/assets/upload/slide/{{$sl->image}}) center center no-repeat;background-size: cover;" data-dot="<span>03</span>">
                <div class="slide-inner"><div class="container" style="position:relative;">  
                    <img src="image/bg_transparent6512.png?11" class="bg-transparent"/> 
                    <div class="content_slideshow content">
                      <div class="row"><div class="col-sm-3"><div class="vc_column-inner vc_custom_1497367543743"><div class="wpb_wrapper"></div></div></div><div class="col-sm-12 col-lg-9 col-md-9">
                          <div class="vc_column-inner vc_custom_1496220809434">
                            <div class="wpb_wrapper" style="text-align: left;">
                            	<h5 style="color:#777777;">
                                 
                                <span class="">{{$sl->title}}</span>
                                {{-- <span class="lang2">Cappellini</span>  --}}
                                
                              </h5>
                              <h4 style="color:#333;">
                                 
                                {{-- <span class="lang1">Wooden<br>Lounge Chairs</span> --}}
                                {{-- <span class="lang2">Wooden<br>Lounge Chairs</span>  --}}
                                
                              </h4>
                              <p class="content1" style="color:#797979;">
                                 
                                {{-- <span class="">Semper vulputate aliquam curae entum<br>quisque gravida fusce cum at.<span> --}}
                                {{-- <span class="">Semper vulputate aliquam curae entum<br>quisque gravida fusce cum at.</span>  --}}
                                  
                              </p>
                              <p class="content2" style="color:#83b735;">
                                 
                                {{-- <span class="lang1">$999.00</span> --}}
                                {{-- <span class="lang2">$999.00</span>  --}}
                                  
                              </p>
                          </div>
                          </div>
                        </div></div>
                    </div> 
                    </div></div> 
              </div>
               @endforeach      

          	</div>
          </div></div>
      </div>
    </div>
  </div><div class="vc_row-full-width vc_clearfix"></div><style>
    .vc_custom_1496220809434 {
      padding-top: 0px !important;
    }
    .vc_custom_1516961703515 .slideshow .content {
                        top:15%;
                        left:3%;
                      }
                      @media(min-width:768px){
                        .vc_custom_1516961703515 .slideshow .content {
                          left:5%;
                        }
                      }
  </style>
</div>