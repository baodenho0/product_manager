@extends('layouts.app')
@section('title','Menus')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white">
        <h5 class="mb-2">
            <button class="btn btn-success btn-rounded" type="button" name="create" data-toggle="modal" data-target="#create-menu" >Create Menu</button>
        </h5>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered" id="users">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ date('d/m/Y H:i', strtotime($menu->created_at)) }}</td>
                            <td>
                                <a href="{{ route('menu-builder.index', $menu->id) }}" class="btn btn-success btn-sm" >
                                    <i class="ti-list"></i> Builder
                                </a>
                                <button type="button" name="edit" data-toggle="modal" data-target="#create-menu" data-href="{{ route('menus.update', $menu->id) }}"  data-name="{{ $menu->name }}" class="btn btn-warning btn-sm"><i class="ti-pencil"></i> Sửa</button>
                                <button type="button" data-toggle="modal" data-target="#delete" data-href="{{ route('menus.destroy', $menu->id) }}" data-name="{{ $menu->name }}" class="btn btn-danger btn-sm" >
                                    <i class="ti-trash"></i> Xóa
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Model create menu--}}
    <div class="modal fade" id="create-menu" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="ame" class="form-control-label">Menu name:</label>
                            <input type="text" class="form-control" name="mName">
                        </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    {{-- Modal delete menu  --}}
    <div class="modal fade small-modal" tabindex="-1" role="dialog" id="delete" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you want to dlete <strong></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnOk" data-token="{{ csrf_token() }}" data-dismiss="modal" class="btn btn-primary btn-rounded">OK</button>
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
            $(this).find("strong").text(name);
            $('#btnOk').click(function () {
                var href = btn.data('href');
                $.post(href, {_token: $(this).data('token'), _method: 'DELETE'}).done(function(rs){
                    if(rs.status === 'error'){
                        toastr.error(rs.message,'Thông báo !!');
                    }else{
                        toastr.success(rs.message, 'Thông báo !!');
                        btn.parent().parent().remove();
                    }
                });
            });
        });

        $('#create-menu').on('show.bs.modal',function(e){
            const button = $(e.relatedTarget);
            const fButton = $(this).find('.modal-footer');
            if(button.attr('name') === 'create'){
                let btnCreate = $('<button>',{ class: 'btn btn-success btn-rounded', type: 'button', text: 'Thêm' });
                fButton.html(btnCreate);
                btnCreate.click(function () {
                    let mName = $('input[name="mName"]').val();
                    $.post('{{ route('menus.store') }}',{ _token:'{{ csrf_token() }}', name: mName }).done(function(data){
                        if(data.status === 'error'){
                            toastr.error(data.message,'Thông báo !!');
                        }else{
                            toastr.success(data.message,'Thông báo !!');
                            $('#create-menu').modal('hide');
                            setTimeout(function(){location.reload();},1000);
                        }
                    });
                });
            }else {
                let btnUpdate = $('<button>',{ class: 'btn btn-warning btn-rounded', type: 'button', text: 'Cập nhật' });
                fButton.html(btnUpdate);
                let name = button.data('name');
                let href = button.data('href');
                $('input[name="mName"]').val(name);
                btnUpdate.click(function(){
                    var mName = $('input[name="mName"]').val();
                    $.ajax({
                        url: href,
                        method: 'PUT',
                        data: { _token:'{{ csrf_token() }}', name: mName},
                        success: function (data) {
                            if(data.status === 'error')
                                toastr.error(data.message,'Thông báo !!');
                            else{
                                toastr.success(data.message,'Thông báo !!');
                                $('#create-menu').modal('hide');
                                setTimeout(function(){location.reload();},1000);
                            }
                        }
                    });
                });
            }
        });
    </script>
@endsection