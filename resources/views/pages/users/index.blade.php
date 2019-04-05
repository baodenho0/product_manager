@extends('layouts.app')
@section('title','Users')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="mb-1">
            <a href="{{ route('users.create') }}" class="btn btn-success btn-rounded">Thêm mới người dùng</a>
        </div>
        <table class="table table-striped table-bordered" id="users">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Ngày tạo</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if($user->hasRole('superadmin'))
                        <td>
                            @if(isset($user->roles[0]))
                            <span class="tag tag-danger">
                                {{ $user->roles[0]->display_name }}
                            </span>
                            @endif
                        </td>
                    @elseif($user->hasRole('admin'))
                        <td>
                        @if(isset($user->roles[0]))
                            <span class="tag tag-primary">
                                {{ $user->roles[0]->display_name }}
                            </span>
                        @endif
                        </td>
                    @else
                        <td>
                        @if(isset($user->roles[0]))
                            <span class="tag tag-success">
                                {{ $user->roles[0]->display_name }}
                            </span>
                        @endif
                        </td>
                    @endif
                    <td>{{  date('d/m/Y H:i',strtotime($user->created_at)) }}</td>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#users-show" data-href="{{ route('users.show', $user->id) }}" class="btn btn-success btn-sm"><i class="ti-eye"></i> Xem</button>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil"></i> Sửa</a>
                        <button type="button" data-toggle="modal" data-target="#delete" data-href="{{ route('users.destroy',$user->id) }}" data-name="{{ $user->name }}" class="btn btn-danger btn-sm" >
                            <i class="ti-trash"></i> Xóa
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links('vendor.pagination.bootstrap-4') }}
    </div>

    <div class="modal fade small-modal" tabindex="-1" role="dialog" id="delete" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Ban có muốn xóa <strong></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnOk" data-dismiss="modal" class="btn btn-primary btn-rounded">OK</button>
                    <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="users-show" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="u-content">
                        <div class="avatar box-96 mb-2">
                            <img class="b-a-radius-circle" src="{{ asset('assets/img/avatars/1.jpg') }}" alt="">
                            <i class="status bg-success bottom right"></i>
                        </div>
                        <div id="info">
                            <h5></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



        @endsection

@section('customJS')
    <script type="text/javascript">
        $('#delete').on('show.bs.modal',function(e){
            var btn = $(e.relatedTarget);
            var name = btn.data('name');
            var href = btn.data('href');
            $(this).find('.modal-body strong').text(name);
            $('#btnOk').off().click(function () {
                $.ajax({
                    url: href,
                    method: 'DELETE',
                    data: { _token : '{{ csrf_token() }}' },
                    success: function(rs){
                        if(rs.status === 'success'){
                            toastr.success(rs.message,'Thông báo !');
                            btn.parent().parent().remove();
                        }else{
                            toastr.error(rs.message,'Thông báo !')
                        }
                    }
                });
            });
        });
        $('#users-show').on('show.bs.modal',function(e){
            var btn = $(e.relatedTarget);
            var href = btn.data('href');
            $.get(href,{_token: '{{ csrf_token() }}'}).done(function(data){
                $('#info').html('<h5>'+data.name+'</h5>' +
                    'Email: <p class="text-muted mb-1">'+data.email+'</p>'+
                    'Vai trò: <p class="text-muted mb-1">'+data.role+'</p>'+
                    'Ngày tạo: <p class="text-muted mb-1">'+data.created_at+'</p>');
            });
        });
    </script>
@endsection