@extends('layouts.app')
@section('title','Danh sách Bill')

@section('customCSS')
    <style type="text/css">
         #top{
            padding-bottom: 10px;
            padding-top: 10px;
        }

    </style>
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
{{-- <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">     --}}
<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">    

@endsection

@section('content')
    <div class="form-group">
      <select name="" id="search-val" class="">
        <option value="">--reload--</option>
        <option value="Chưa giao hàng">Chưa giao hàng</option>
        <option value="Đã giao hàng">Đã giao hàng</option>
      </select>
      <button type="button" name="search" id="search" class="btn btn-success btn-sm">Search</button><br><br>
    </div>

    <table id="datatable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID </th>
        <th>Tổng tiền(đ)</th>
        <th>Ngày đặt hàng</th>
        <th class="status">Trạng thái </th>
        <th>Chi tiết</th>        
        
      </tr>
    </thead>
    <tbody>

    </tbody> 
    </table> 

    {{-- show dialog --}}
    <div id="detailModal" class="modal fade" role="dialog">
      <div class=" modal-dialog">
        <div class="modal-content">
         
            <div class="modal-header">
              <button type=" button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Chi tiết</h4>
            </div>
            <div class="modal-body">
              
              <span id="form_output"></span>
              <div class="form-group">
                <label  for="">ID: <label id="id" ></label></label><br> 
                <label  for="">Tổng tiền: <label id="total" ></label>đ</label><br> 
                <label  for="">Ngày đặt hàng: <label id="created_at" ></label></label><br> 
                <label  for="">Trạng thái: <label class="btn btn-info btn-sm" id="status" ></label></label><br>                             
              </div>
              <hr>
              <div class="form-group">
                <label  for="">Tên người đặt: <label id="name" ></label></label><br>       
                <label  for="">Số điện thoại: <label id="phone" ></label></label><br>                
                <label  for="">Email: <label id="email" ></label></label><br>          
                <label  for="">Địa chỉ: <label id="address" ></label></label><br>            
              </div>
              <hr>
              <div class="form-group">
                <label id="product" for=""></label>
                
                
                
              </div>                       

              
            
            </div>

            <div class="modal-footer">
              
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          
        </div>
      </div>
    </div> 
    {{-- end show dialog  --}}
  
@endsection

@section('customJS')
    <script type="text/javascript" src="{{ asset('assets/customs/products.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/format_number.js') }}"></script>
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" src="{{ asset('assets/vendor/dropify/dist/js/dropify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script type="text/javascript">
        $('.dropify').dropify();
    </script>
    <script type="text/javascript">

$(document).ready(function() {

    
    table = $('#datatable').DataTable({
             dom: "lBfrtip",
             buttons: [
                 {   
                    text: '<i class="glyphicon glyphicon-plus fa fa-plus"></i> Add New',                    
                    className: "btn-sm btn-add",
                    action: function ( e, dt, node, config ) {
                        document.location.href = "giftcard/add";
                    }

                 }
             ],  
             processing: true,
             serverSide: true,
         ajax:{ url:"{{ route('bills.load') }}",
         data: function (data) {

              } 
          },
         columns: [

                  { data: 'id', name: 'id' },
                  { data: 'total', name: 'total' },
                  { data: 'created_at', name: 'created_at' },
                  { data: 'bill_status', name: 'bill_status' },
                  { data: 'detail' , name:'detail',orderable: false, searcheble: false},
                  

                 
          ],       
       }); 

    
   $(document).on('click','.detail', function(e){
      e.preventDefault();
          $('#id').text('');
          $('#total').text('');
          $('#created_at').text('');
          $('#status').text('');
          $('#name').text('');
          $('#phone').text('');
          $('#email').text('');
          $('#address').text('');

      var id = $(this).attr('id');
      load_view();
          function load_view(){
          $.ajax({ 
            url:'{{ route('bills.detail.load') }}',
            data:{id:id},
            method:'get',
            dataType:'json',
            success:function(data){ 
              $('#detailModal').modal('show');
              $('#id').text(data.bill.id);
              $('#total').text(formatNumber(data.bill.total,'.',','));
              $('#created_at').text(data.bill.created_at);
              //
              $('#status').text(data.bill.bill_status);
              //
              $('#name').text(data.bill.client.name);
              $('#phone').text(data.bill.client.phone);
              $('#email').text(data.bill.client.email);
              $('#address').text(data.bill.client.address);
              var product = '';
              for (var i = 0; i < data.product_bill.length ; i++)
              product += 'Sản phẩm: '+"<b>"+ data.product_bill[i].name +"</b>"+ '| số lượng: ' +"<b>"+ data.product_bill[i].quantity+"</b>" + "<br>";
              $('#product').html(product);

            }
          })
        } // end function
    });
    

    $(document).on('click','#search',function(){
      var val = $('#search-val').val();        
        table.columns('.status').search(val).draw();        
    });

    //update status
    $(document).on('click','#status',function(e){
      e.preventDefault();
      var id = $('#id').text();
      $.ajax({
        url:"{{ route('bills.detail.update.status') }}",
        data:{id:id},
        method:"get",
        success:function(data){
          table.draw();
          $('#detailModal').modal('hide');
          alert(data);
        }
      })
    })
}); 
</script>    
@endsection