 <div class="vertical-navigation header-categories-nav opened-menu" role="navigation">
        <span class="menu-opener color-scheme-light has-bg">
          <span class="menu-open-label">
            <span class="burger-icon"></span>
            
            <span class="">Browse Categories</span>
            
          </span>
          <span class="arrow-opener"></span>
        </span>
        <div class="categories-menu-dropdown woodmart-navigation">
          <div class="menu-categories-container">
            <div id="shopify-section-categories-menu" class="shopify-section"><ul id="menu-categories" class="menu">
              @foreach ($menu_dropdown as $mn_d)
             
              <li id="menu-item-1514826286378" class="menu-item menu-item-type-taxonomy menu-item-furniture menu-item-1514826286378 menu-item-design-sized item-level-0 menu-mega-dropdown item-event-hover with-offsets">
    <a href="/{{$mn_d->slug}}" class="woodmart-nav-link"><div class="category-icon" style="width: 19px;height: 19px;">
    </div><span>
        
        <span class="">{{$mn_d->name}}</span>
        
      </span></a>
     </li>

      @endforeach
     </ul>
   </div>
 </div>
</div>


</div>