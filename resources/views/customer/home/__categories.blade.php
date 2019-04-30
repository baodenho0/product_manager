<div class="products shopify row categories-style-masonry-first categories-masonry  woodmart-spacing-20 products-spacing-20">
              @foreach ($menu_dropdown_f as $mn_d)
              
              <div class="col-xs-12 col-sm-4 col-md-3  category-grid-item cat-design-default product-category product" >
                <div class="wrapp-category">
                  <div class="category-image-wrapp">
                    <a href="/{{$mn_d->slug}}" class="category-image">
                      
                      <img src="../assets/upload/product_type/{{$mn_d->image}}" alt="{{str_slug($mn_d->name)}}"/>
                      
                    </a>
                  </div>
                  <div class="hover-mask">
                    
                    <h3 class="category-title">
                      
                      <span class="">{{$mn_d->name}}</span>
                      {{-- <span class="lang2">Clocks</span> --}}
                       
                      {{-- <mark class="count">(23)</mark> --}}
                    </h3>
                    <div class="more-products">
                      <a href="/{{$mn_d->slug}}" >{{$mn_d->count}} Sản phẩm</a>
                    </div>
                    
                  </div>
                  <a href="/{{$mn_d->slug}}" class="category-link"></a>
                </div>
              </div>
              @endforeach


              
 </div>