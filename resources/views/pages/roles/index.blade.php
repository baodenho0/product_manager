@extends('layouts.app')
@section('title','Roles')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="mb-1">
            <a href="{{ route('roles.create') }}" class="btn btn-success btn-rounded">Create Role</a>
        </div>
        <table class="table table-striped table-bordered" id="users">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Tên hiển thị</th>
                <th>Mô tả</th>
                <th>Thời gian tạo</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($role->created_at)) }}</td>
                    <td>
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-success btn-circle btn-sm" >
                            <i class="ti-eye"></i>
                        </a>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="ti-pencil"></i></a>
                        <button type="button" data-toggle="modal" data-target="#delete" data-href="{{ route('roles.destroy', $role->id) }}" data-name="{{ $role->display_name }}" class="btn btn-danger btn-circle btn-sm" >
                            <i class="ti-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $roles->links('vendor.pagination.bootstrap-4') }}
    </div>

    <div class="modal fade small-modal" tabindex="-1" role="dialog" id="delete" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you want to delete <strong></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnOk" data-dismiss="modal" class="btn btn-primary btn-rounded">OK</button>
                    <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Close</button>
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
            $(this).find("strong").text(name);
            $('#btnOk').click(function () {
                $.ajax({
                    url: href,
                    method: 'DELETE',
                    data: { _token : '{{ csrf_token() }}' },
                    success: function (rs){
                        if(rs.status == 'success'){
                            toastr.success('Delete role '+ name+' is success !!','Success !!')
                            btn.parent().parent().remove();
                        }else{
                            toastr.error(rs.message, 'Thông báo !');
                        }
                    }
                });
            });
        });
    </script>
@endsection