@extends('layouts.app')
@section('title','Hóa đơn xuất')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="box box-block bg-white clearfix">
        <form action="" method="POST">
            <div class="form-group">
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                <label for="bill-code">Mã hóa đơn xuất</label>
                <input type="text"  class="form-control" name="bill-code" placeholder="Nhập mã hóa đơn...">
            </div>
            <div class="form-group">
                <label for="product_type">Loại sản phẩm</label>

                <select id="product_type"  class="form-control">
                    <option value=""></option>
                    @foreach($productTypes as $productType)
                        <option value="{{ route('ajax.list.products',$productType->id) }}">{{ $productType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="fProducts" style="display: none;">
                <label for="products">Sản phẩm</label>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <select id="products"  class="form-control"  data-plugin="select2" style="width: 100%">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="number" class="form-control" name="p-quantity" placeholder="Nhập số lượng sản phẩm xuất...">
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                        <button type="button" class="btn btn-success" id="add-to-bill">Thêm</button>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <table class="table table-hover" id="product-bill">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Mã sản phẩm</td>
                        <td>Tên</td>
                        {{--<td>Đã xi tồn</td>--}}
                        {{--<td>Đã xi xuất</td>--}}
                        <td>Chưa xi tồn</td>
                        <td>Chưa xi xuất</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="bill-code">Ghi chú</label>
                <textarea class="form-control" name="note" cols="30" rows="3" placeholder="Ghi chú..."></textarea>
            </div>
            <div class="form-group pull-right">
                <button type="button" class="btn btn-success" data-route="{{ route('bill.export.store') }}" name="submit">Xác nhận</button>
            </div>
        </form>
    </div>

@endsection

@section('customJS')
    <script type="text/javascript" src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-plugin="select2"]').select2($(this).attr('data-options'));
            const pdObj = $('select#products');
            const fProducts = $('#fProducts');
            const ipQtt = $('input[name="p-quantity"]');
            const tbody = $('#product-bill tbody');
            $('#product_type').on('change',function () {
                fProducts.slideDown();
                let href = $(this).val();
                if(href){
                    $.get(href).done(function (rs) {
                        if(rs){
                            $.each(rs, function(i,pd){
                                var option = $('<option>',{ value: `{"id":${pd.id},"code":"${pd.code}","name":"${pd.name}","qttOld":${pd.quantity}, :${pd.quantity_si}}`, text: `Mã: ${pd.code} - Tên: ${pd.name} - Chưa xi: ${pd.quantity} `});
                                $('#products').append(option);
                            });
                        }else{
                            toastr.error('Load product error !!', 'Error');
                        }
                    });
                }else{
                    fProducts.slideUp();
                }
            });
            let data = [];
            $('#add-to-bill').off().click(function(){
                let pd =  JSON.parse(pdObj.val());
                let qttNew = parseInt(ipQtt.val());
                if(qttNew > 0 && qttNew != NaN){
                    let item = {id:pd.id, code:pd.code, name:pd.name, qttOld: pd.qttOld, qttNew: 0, qttXiOld : pd.qttXiOld, qttXiNew : 0 };
                    if(data.length < 1){
                        if(parseInt(type.val())){
                            if(qttNew > item.qttXiOld){
                                toastr.warning('Số lượng xuất phải nhỏ hơn số lượng tồn.','Thông báo !');
                                return false;
                            } else item.qttXiNew = qttNew;
                        }else{
                            if(qttNew > item.qttOld){
                                toastr.warning('Số lượng xuất phải nhỏ hơn số lượng tồn.','Thông báo !');
                                return false;
                            } else item.qttNew = qttNew;
                        }
                        data.push(item);
                    }else{
                        let status = false;
                        $.each(data,function (i, val){
                            if(val.code === pd.code){
                                status = true;
                                if(parseInt(type.val())){
                                    if((qttNew+val.qttXiNew) > val.qttXiOld){
                                        toastr.warning('Số lượng xuất phải nhỏ hơn số lượng tồn.','Thông báo !');
                                        return false;
                                    }else val.qttXiNew += qttNew;
                                }else{
                                    if((qttNew+val.qttNew) > val.qttOld){
                                        toastr.warning('Số lượng xuất phải nhỏ hơn số lượng tồn.','Thông báo !');
                                        return false;
                                    }else val.qttNew += qttNew;
                                }
                            }
                        });
                        if(!status){
                            if(parseInt(type.val())){
                                if(qttNew > item.qttXiOld){
                                    toastr.warning('Số lượng xuất phải nhỏ hơn số lượng tồn.','Thông báo !');
                                    return false;
                                } else item.qttXiNew = qttNew;
                            }else{
                                if(qttNew > item.qttOld){
                                    toastr.warning('Số lượng xuất phải nhỏ hơn số lượng tồn.','Thông báo !');
                                    return false;
                                } else item.qttNew = qttNew;
                            }
                            data.push(item);
                        }
                    }
                }else{
                    toastr.warning('Số lượng xuất phải lớn hơn 0', 'Thông báo');
                }
                let row = '';
                let stt = 0;
                $.each(data, function (i,item) {
                    stt++;
                    row +=
                        `<tr>
                            <td>${stt}</td>
                            <td>${item.code}</td>
                            <td>${item.name}</td>
                            <td>${item.qttOld}</td>
                            <td>${item.qttNew}</td>
                            <td><button type="button" class="btn btn-warning btn-sm remove" data-id="${item.id}">Xóa</button></td>
                        </tr>`;
                });
                tbody.html(row);
                $('.remove').on('click',function(){
                    let btn = $(this);
                    let id = $(this).data('id');
                    $.each(data,function(i,val){
                        if(parseInt(id) === val.id) {
                            data.splice(i,1);
                            btn.parent().parent().remove();
                        }
                    });
                })
            });

            $('button[name="submit"]').off().click(function(){
                let billCode = $('input[name="bill-code"]').val();
                let token = $('input[name="_token"]').val();
                let note = $('textarea[name="note"]').val();
                let input = {_token: token, note: note, code: billCode, products: data};
                $.ajax({
                    url: $(this).data('route'),
                    dataType: 'json',
                    method: 'POST',
                    data: input,
                    success:function(rs){
                        if(rs.status ==='success'){
                            toastr.success('Thêm hóa đơn nhập hàng thành công','Thông báo');
                            setTimeout(function(){ location.href = rs.href;},1000);
                        }else{
                            toastr.error('Đã xảy ra lỗi vui lòng kiểm tra lại','Thông báo');
                        }
                    }
                });

            });

        });

    </script>
@endsection