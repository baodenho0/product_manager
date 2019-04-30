$( document ).ready(function() { 
  load_cart();
  function load_cart(){
    $.ajax({
      url:"/cart/get/1",
      method:"get",
      dataType:"json",
      success:function(data){
        var total = formatNumber(data.cart_total,'.',',');
        $(".cart_count").text(data.cart_count);
        $(".cart_total").text(total);
        if(data.cart_count > 0){
          $('#empty_cart').css('display','none');
          $('#isset_cart').css('display','');
        }
        else{
         $('#empty_cart').css('display','');
         $('#isset_cart').css('display','none');
        }
        load_list_cart(data);
      }
    })
  };

  function load_list_cart(data){  
        if(data.list.length){
          var list_cart = '';
          for(var i = 0; i < data.list.length; i++){
            list_cart += data.list[i];
          }
          $('#load_cart').html(list_cart);         
        }  
  };

  $(document).on('click','.add_to_cart', function(){
    var id = $(this).attr('id');
    var quantity = $('#qty').val(); 
    $.ajax({
      url:"/cart/add/1",
      method:"get",      
      data:{id:id,quantity:quantity},
      success:function(data){
        alert(data);
        load_cart();
        
      }
    })    
  });

  $(document).on('click','.remove_cart',function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    $.ajax({
      url:"/cart/remove/1",
      method:"get",
      data:{id:id},
      success:function(data){
        alert(data);
        load_cart();        
      }
    })
  });

});

function formatNumber(nStr, decSeperate, groupSeperate) {
            nStr += '';
            x = nStr.split(decSeperate);
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
            }
            return x1 + x2;
};

$('.minus').on('click',function(){
  var qty = $('#qty').val();
  if(qty > 1) qty--;
  $('#qty').val(qty);
  // alert($('#qty').val()); 
});

$('.plus').on('click',function(){
  var qty = $('#qty').val();
  qty++;
  $('#qty').val(qty);
  // alert($('#qty').val());
});