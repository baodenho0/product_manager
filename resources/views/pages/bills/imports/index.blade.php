@extends('layouts.app')
@section('title','Dashboard')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white clearfix">
        <div class="mb-1">
            <a class="btn btn-success btn-rounded" href="{{ route('bill.import.create') }}">Thêm mới hóa đơn nhập</a>
        </div>
        <table class="table table-striped table-bordered" id="bills">
            <thead>
            <tr>
                <th>ID</th>
                <th>Mã hóa đơn</th>
                <th>Nhà cung cấp</th>
                <th>Ngày nhập</th>
                <th>Người nhập</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bills as $bill)
                <tr>
                    <td>{{ $bill['id'] }}</td>
                    <td>{{ $bill['code'] }}</td>
                    <td>{{ $bill['company'] }}</td>
                    <td>{{ $bill['created_at'] }}</td>
                    <td>{{ $bill['user'] }}</td>
                    <td>
                        <a href="{{ route('bill.import.show', $bill['id']) }}" class="btn btn-success btn-sm"><i
                                    class="ti-eye"></i> Xem</a>
                        <button data-href="{{route('bill.import.delete',$bill['id'])}}" data-name="" data-toggle="modal"
                                data-target="#delete"
                                class="btn btn-danger btn-sm"><i class="ti-trash"></i> Xóa
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade small-modal" tabindex="-1" role="dialog" id="delete" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Do you want to delete <strong></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnOk" data-token="{{ csrf_token() }}" data-dismiss="modal"
                            class="btn btn-primary btn-rounded">OK
                    </button>
                    <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customJS')
    <script>
        $(document).ready(function () {
            $('#delete').on('show.bs.modal', function (e) {
                var btn = $(e.relatedTarget);
                var name = btn.data('name');
                $(this).find("strong").text(name);
                var href = btn.data('href');
                $('#btnOk').off().click(function () {
                    var token = $(this).data('token');
                    $.post(href, {_token: token, _method: 'DELETE'}).done(function (rs) {
                        if (rs.type === 'success') {
                            toastr.success(rs.message, 'Success !!');
                            $('#delete').modal('hide');
                            btn.parent().parent().remove();
                        }
                    });
                });
            });
        });
    </script>
@endsection