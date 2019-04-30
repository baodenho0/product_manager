@extends('layouts.app')
@section('title','Setting')
@section('customCSS')
<link rel="stylesheet" href="{{ asset('assets/vendor/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endsection
@section('content')
    <div class="">
      <button type="button" name="add" id="logo" class="btn btn-success btn-sm">Cập nhật Logo</button><br><br>
    </div>
     {{-- show dialog --}}
    <div id="logoModal" class="modal fade" role="dialog">
      <div class=" modal-dialog">
        <div class="modal-content">
          <form method="post" id="logo_form" enctype="multipart/form-data">
            <div class="modal-header">
              <button type=" button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Cập nhật Logo</h4>
            </div>
            <div class="modal-body">
              {{csrf_field()}}
              <span id="form_output"></span>
              <div class="form-group">
                <label for="">Tiêu đề</label>
                <input id="title"  type="text" name="title" class="form-control">
              </div>
              
             <div class="form-group">
                <label for="">Logo</label>
                <input id='file' type="file" name="image" class="dropify" />
            </div>
             </div>

            <div class="modal-footer">
              <input type="submit" name="submit" id="action" value="Xác nhận" class="btn btn-info">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div> 
    {{-- end show dialog  --}}
    <form class="form-control" style="width: 600px;">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="status">Setting</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                </div>
                <div class="form-group" id="link_url">
                    <label for="ad">Nhập password cũ</label>
                    <input type="password" class="form-control" id="old-password"
                           placeholder="Nhập password cũ">
                </div>
                <div class="form-group">
                    <label for="rr">Nhập password mới</label>
                    <input type="password" class="form-control" id="new-password"
                           placeholder="Nhập password mới">
                </div>
                <div class="form-group">
                    <label for="rr">Nhập lại password mới</label>
                    <input type="password" onkeyup="check()" class="form-control" id="cpassword"
                           placeholder="Nhập lại password mới">
                    <label id="z-cpassword"></label>
                </div>
                <div class="modal-footer">
                    <input type="button" disabled class="btn btn-primary btn-lg" id="btn-change-password" value="Đổi password">
                    <input type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#resetpass"
                           value="Reset password">
                </div>
            </div>
        </div>
    </form>
    <div id="resetpass" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nhập email xác nhận</h4>
                </div>
                <div class="modal-body">
                    <form id="form-reset-password" action="{{route('setting.email')}}" method="POST"
                          class="form-control">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group" align="right">
                            <input type="submit" id="submit" class="btn btn-success" value="Xác nhận">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @foreach($set as $s)
            <input type="hidden" id="hidden" value="{{$s->value2}}">
        @endforeach
        @endsection

        @section('customJS')
        <script type="text/javascript" src="{{ asset('assets/vendor/dropify/dist/js/dropify.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
            <script type="text/javascript">
                    $('.dropify').dropify();
             </script>
             {{-- <script>
                 $('#logo').click(function(){
                  $('#logoModal').modal('show');
                });
             </script> --}}
             <script type="text/javascript">


                $(document).ready(function(){

                    $('#logo').click(function(){
                        $('#logoModal').modal('show');
                        $('#form_output').html('');
                        $.ajax({
                            url:"{{route('logo.getlogo')}}",
                            method:'get',
                            data:false,
                            dataType:'json',
                            success:function(data){
                                $('#title').val(data.title);
                                // $('.dropify-render img').src('213');
                            }
                        })
                    });

                    //ajax
                    $('#logo_form').on('submit',function(event){
                      event.preventDefault();

                      var form = $('#logo_form')[0];
                      var form_data = new FormData(form);
                      
                      $.ajax({
                        url:"{{route('logo.postdata')}}",
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
                          }
                        }
                      })

                    });

                });
            </script>
            {{--script add password delete paytemp --}}
            <script>
                function check() {
                        var newpass = document.getElementById('new-password').value;
                        var cnewpass = document.getElementById('cpassword').value;
                        if (newpass==cnewpass) {
                            document.getElementById('z-cpassword').innerHTML = "<span style='color:greemn'>Mật khẩu đã khớp</span>";
                            $("#btn-change-password").prop('disabled', false);
                        } else {
                            document.getElementById('z-cpassword').innerHTML = "<span style='color:red'>Mật khẩu chưa khớp</span>";
                            $("#btn-change-password").prop('disabled', true);
                        }
                    } 
                $(document).ready(function () {

                      
                    $('#btn-change-password').click(function () {
                        const oldPassword = $('#old-password');
                        const newPassword = $('#new-password');
                        $.ajax({

                            url: "{{route('setting.change-password')}}",
                            method: 'POST',
                            data: {
                                '_token': $('input[name=_token]').val(),
                                oldPassword: oldPassword.val(),
                                newPassword: newPassword.val()
                            },
                            dataType: 'json',
                            success: function (data) {
                                alert(data.status);
                                oldPassword.val('');
                                newPassword.val('');
                            }
                        });
                    });
                    $('#form-reset-password').submit(function () {
                        if ($('#email').val() != $('#hidden').val()) {
                            alert('Vui lòng nhập lại email');
                            return false;
                        } else {
                            alert('Password đã được gửi đến email của bạn');
                        }
                    });
                })




            </script>
            
@stop