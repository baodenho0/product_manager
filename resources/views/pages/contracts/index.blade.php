@extends('layouts.app')
@section('title','Danh Sách Hợp Đồng')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white clearfix">
        <div class="mb-1">
            <a class="btn btn-success btn-rounded" href="{{ route('contracts.create') }}" >Thêm mới Hợp Đồng</a>
        </div>
        <table class="table table-striped table-bordered" id="bills">
            <thead>
            <tr>
                <th>ID</th>
                <th>Mã HĐ</th>
                <th>Tên Khách Hàng</th>
                <th>Chú Thích</th>
                <th>Ngày nhập</th>
                <th>Người nhập</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <td>{{ $contract['id'] }}</td>
                        <td>{{ $contract['contract_code'] }}</td>
                        <td>{{ $contract['customer_name'] }}</td>
                        <td>{{ $contract['note'] }}</td>
                        <td>{{  date('d/m/Y H:i',strtotime($contract['created_at']))  }}</td>
                        <td>{{ $contract->user['name'] }}</td>
                        <td>
                            <a href="{{ route('contracts.show', $contract['id']) }}" class="btn btn-success btn-sm"><i class="ti-eye"></i> Xem</a>
                            <button data-href="{{ route('contracts.destroy',$contract['id']) }}" data-name="" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-sm"><i class="ti-trash"></i> Xóa</button>
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
                    <p>Ban có muốn xóa <strong></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnOk" data-dismiss="modal" class="btn btn-primary btn-rounded">OK</button>
                    <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Hủy</button>
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
    
</script>
@endsection