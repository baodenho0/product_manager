@extends('layouts.app')
@section('title','Setting')
@section('content')
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