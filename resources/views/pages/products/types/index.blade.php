@extends('layouts.app')
@section('title','Dashboard')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="mb-1">
            <button type="button" class="btn btn-success btn-rounded" data-href="{{ route('products.types.store') }}" data-type="add" data-toggle="modal" data-target="#create-product-type">Add new product type</button>
        </div>
        <table class="table table-striped table-bordered" id="product-types">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($productTypes as $productType)
                <tr>
                    <td>{{ $productType->id }}</td>
                    <td>{{ $productType->name }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($productType->created_at)) }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-href="{{ route('products.types.update',$productType->id) }}" data-name="{{ $productType->name }}" data-toggle="modal" data-target="#create-product-type"><i class="ti-pencil"></i> Sửa</button>
                        <button type="button" class="btn btn-danger btn-sm" data-href="{{ route('products.types.destroy',$productType->id) }}" data-name="{{ $productType->name }}" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i> Xóa</button>
                    </td>
                </tr>
                @empty
                <tr style="text-align: center;">
                    <td colspan="4">No data record</td>
                </tr>
             @endforelse
            </tbody>
        </table>
    </div>
    {{-- Model create product type--}}
    <div class="modal fade" id="create-product-type" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            {{ csrf_field() }}
                        </div>
                        <div class="form-group">
                            <label for="type-name" class="form-control-label">Product type name</label>
                            <input type="text" class="form-control" name="type-name">
                        </div>
                    </form>
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
                    <p>Do you want to delete <strong></strong> ?</p>
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
        $(document).ready(function(){
            $('#delete').on('show.bs.modal',function(e){
                var btn = $(e.relatedTarget);
                var name = btn.data('name');
                $(this).find("strong").text(name);
                var href = btn.data('href');
                $('#btnOk').click(function () {
                    var token = $(this).data('token');
                    $.post(href, {_token: token, _method: 'DELETE'}).done(function(rs){
                        if(rs.type ==='success'){
                            toastr.success(rs.message,'Success !!');
                            $('#delete').modal('hide');
                            btn.parent().parent().remove();
                        }
                    });
                });
            });
            $('#create-product-type').on('show.bs.modal',function(e){
                var btn = $(e.relatedTarget);
                var fBtn = $(this).find('.modal-footer');
                var modal = $(this);
                var input = modal.find('input[name="type-name"]');
                if(btn.data('type') === 'add'){
                    input.val('');
                    var btnAdd = $('<button>',{class:'btn btn-success btn-rounded',text:'Add',disabled:true});
                    fBtn.html(btnAdd);
                    input.keyup(function(){ btnAdd.attr('disabled', $(this).val().length === 0)});
                    btnAdd.click(function(){
                        var href = btn.data('href');
                        var typeName = input.val();
                        var token = modal.find('input[name="_token"]').val();
                        $.post(href,{_token:token, name : typeName}).done(function(rs){
                            if('success' === rs.type){
                                toastr.success(rs.message,'Success !');
                                modal.modal('hide');
                                setTimeout(function(){location.reload()},1000);
                            }
                        });
                    });
                }else{
                    var btnUpdate = $('<button>',{class:'btn btn-warning btn-rounded',text:'Update',disabled:true});
                    fBtn.html(btnUpdate);
                    input.val(btn.data('name'));
                    input.keyup(function(){ btnUpdate.attr('disabled', $(this).val().length === 0)});
                    btnUpdate.click(function () {
                        var href = btn.data('href');
                        var typeName = input.val();
                        var token = modal.find('input[name="_token"]').val();
                        $.post(href,{_token:token, name : typeName, _method: 'PUT'}).done(function(rs){
                            if(rs.type === 'success'){
                                toastr.success(rs.message,'Success !');
                                modal.modal('hide');
                                setTimeout(function(){location.reload()},1000);
                            }
                        });
                    });

                }
            });
        });

    </script>
@endsection