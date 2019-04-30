@extends('layouts.app')
@section('title','Quản Lý Slide')

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
    <div class="">
      <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add</button><br><br>
    </div>
    <table id="datatable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID </th>
        <th>Title</th>
        <th>Image</th>
        <th>Active</th>        
        <th>Action</th>        
      </tr>
    </thead>
    <tbody>

    </tbody> 
    </table> 
  {{-- show dialog --}}
    <div id="productModal" class="modal fade" role="dialog">
      <div class=" modal-dialog">
        <div class="modal-content">
          <form method="post" id="product_form" enctype="multipart/form-data">
            <div class="modal-header">
              <button type=" button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Data</h4>
            </div>
            <div class="modal-body">
              {{csrf_field()}}
              <span id="form_output"></span>
              <div class="form-group">
                <label for="">Title</label>
                <input id="title" required="" type="text" name="title" class="form-control">
              </div>
             <div class="form-group">
                <label for="">Image</label>
                <input id='file' type="file" name="image" class="dropify" />
              </div>
              <div class="form-group">
                <label for="">Active</label>
                {{-- <input id="active" required="" type="text" name="active" class="form-control"> --}}
                <select name="active" id="active" class="form-control">
                  <option value="1">Có</option>
                  <option value="0">Không</option>
                </select>
              </div>
              
            
            </div>

            <div class="modal-footer">
              <input type="hidden" name="slide_id" id="slide_id" value="">
              <input type="hidden" name="button_action" id="button_action" value="insert" > 
              <input type="submit" name="submit" id="action" value="Add" class="btn btn-info">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div> 
    {{-- end show dialog  --}}
@endsection

@section('customJS')
    <script type="text/javascript" src="{{ asset('assets/customs/products.js') }}"></script>
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
    
    oTableOrder = $('#datatable').DataTable({
             dom: "lBfrtip",
             buttons: [
                 {   
                     extend: 'csv', 
                     text: '<i class="glyphicon glyphicon-export"></i> Export',
                     className: "btn-sm"
                 }
             ],  
             processing: true,
             serverSide: true,
         ajax:{ url:"{{ route('slide.load') }}",
         data: function (d) {

              } 
          },
         columns: [

                  { data: 'id', name: 'id' },
                  { data: 'title', name: 'title' },
                  { data: 'image', name: 'image' },
                  { data: 'active' , name:'active'},
                  { data: 'action' , name:'action' ,orderable: false, searcheble: false}

                 
          ],       
       }); 
    
    $('#add_data').click(function(){
      $('#productModal').modal('show');
      $('#product_form')[0].reset();
      $('#form_output').html('');
      $('#button_action').val('insert');
      $('#action').val('Add');
      $('.modal-title').text('Add Data');
    });
    //add ajax 
    $('#product_form').on('submit',function(event){
      event.preventDefault();

      var form = $('#product_form')[0];
      var form_data = new FormData(form);
      // var form_data = $(this).serialize();
      //form_data.append('image',$('#file').prop('file') );
      
      $.ajax({
        url:"{{route('slide.postdata')}}",
        method: "POST",
        data: form_data,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(data){
          if(data.error.length > 0){
            var error_html ='';
            for(var count = 0; count < data.error.length;count++){
              error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
            }
            $('#form_output').html(error_html);
          }else{
            $('#form_output').html(data.success);
            // $('#product_form')[0].reset();
            // $('#action').val('Add');
            // $('.modal-title').text('Add Data');
            // $('#button_action').val('insert');
            $('#datatable').DataTable().ajax.reload();
            // var seccess_html = '<div class="alert alert-success">Data Inserted</div>';
            // $('#form_output').html(seccess_html);
          }
        }
      })
    });

    $(document).on('click', '.edit', function(){
      var id = $(this).attr("id");
      $('#form_output').html('');
      $.ajax({
        url:"{{ route('slide.editdata') }}",
        method:'get',
        data:{id:id},
        dataType:'json',
        success:function(data){
            $('#title').val(data.title);
            // $('#active').val(data.active);
            //--
            var optionValue  = data.active;
            $("#active").val(optionValue)
            .find("option[value=" + optionValue +"]").attr('selected', true);
            //--
            $('#slide_id').val(id);
            $('#productModal').modal('show');
            $('#action').val('Edit');
            $('.modal-title').text('Edit Data');
            $('#button_action').val('update');
        }
      })
    });

    $(document).on('click','.delete', function(){
      var id = $(this).attr('id');
      if(confirm("Are you sure you want to Delete this data?")){
        $.ajax({
          url:"{{ route('slide.deletedata') }}",
          method:"get",
          data:{id:id},
          success:function(data){
            alert(data);
            $('#datatable').DataTable().ajax.reload();
          }
        })
      }
      else{
        return false;
      }
    });
    
}); 
</script>    
@endsection