@extends('layouts.app')
@section('title','Dashboard')

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
                <label for="company">Công ty</label>
                <div class="row">
                    <div class="col-md-10">
                        <select name="company" class="form-control">
                            <option value=""></option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }} - {{ $company->address }}
                                    - {{ $company->phone }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="button" data-toggle="modal" data-target="#add-company" class="btn btn-success">
                            Thêm
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="bill-code">Mã hóa đơn nhập</label>
                <input type="text" class="form-control" name="bill-code" placeholder="Nhập mã hóa đơn...">
            </div>
            <div class="form-group">
                <label for="product_type">Loại sản phẩm</label>

                <select id="product_type" class="form-control">
                    <option value=""></option>
                    @foreach($productTypes as $productType)
                        <option value="{{ route('ajax.list.products',$productType->id) }}">{{ $productType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="fProducts" style="display: none;">
                <label for="products">Sản phẩm</label>
                <div class="row">
                    <div class="col-sm-6">
                        <select id="products" class="form-control" data-plugin="select2" style="width: 100%">
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="p-price"
                               placeholder="Giá nhập...">
                    </div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" name="p-quantity"
                               placeholder="Nhập số lượng sản phẩm nhập...">
                    </div>
                    <div class="col-sm-1">
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
                        <td>SL tồn</td>
                        <td>Giá nhập</td>
                        <td>SL nhập</td>
                        <td>Hành động</td>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="form-group pull-right">
                <button type="button" class="btn btn-success" data-route="{{ route('bill.import.store') }}"
                        name="submit">Xác nhận
                </button>
            </div>
        </form>
    </div>
    <div class="modal fade" id="add-company" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Thêm công ty</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{ csrf_field() }}
                    </div>
                    <div class="form-group">
                        <label for="c-name">Tên công ty</label>
                        <input type="text" class="form-control" name="c-name">
                    </div>
                    <div class="form-group">
                        <label for="c-address">Địa chỉ</label>
                        <input type="text" class="form-control" name="c-address">
                    </div>
                    <div class="form-group">
                        <label for="c-phone">Số điện thoại</label>
                        <input type="text" class="form-control" name="c-phone">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-action="{{ route('companies.store') }}"
                            name="c-btn">Thêm
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJS')
    <script type="text/javascript" src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-plugin="select2"]').select2($(this).attr('data-options'));
            const pdObj = $('select#products');
            const fProducts = $('#fProducts');
            const ipQtt = $('input[name="p-quantity"]');
            const tbody = $('#product-bill tbody');
            const price=$('input[name="p-price"]');
            $('#product_type').on('change', function () {
                fProducts.slideDown();
                let href = $(this).val();
                if (href) {
                    $.get(href).done(function (rs) {
                        if (rs) {
                            $.each(rs, function (i, pd) {
                                var option = $('<option>', {
                                    value: `{"id":${pd.id},"code":"${pd.code}","name":"${pd.name}","qttOld":${pd.quantity}}`,
                                    text: `Mã: ${pd.code} - Tên: ${pd.name}`
                                });
                                $('#products').append(option);
                            });
                        } else {
                            toastr.error('Load product error !!', 'Error');
                        }
                    });
                } else {
                    fProducts.slideUp();
                }
            });
            let data = [];
            $('#add-to-bill').off().click(function () {
                let pd = JSON.parse(pdObj.val());
                let qttNew = parseInt(ipQtt.val());
                let pprice=parseInt(price.val());
                if (qttNew > 0 && qttNew != NaN) {
                    let item = {
                        id: pd.id,
                        code: pd.code,
                        name: pd.name,
                        qttOld: pd.qttOld,
                        qttNew: 0,
                        price:pprice
                    };
                    if (data.length < 1) {
                        item.qttNew = qttNew;
                        data.push(item);
                    } else {
                        let status = false;
                        $.each(data, function (i, val) {
                            if (val.code === pd.code) {
                                status = true;
                                val.qttNew += qttNew;
                            }
                        });
                        if (!status) {

                            item.qttNew = qttNew;

                            data.push(item);
                        }
                    }
                } else {
                    toastr.warning('Số lượng nhập mới phải lớn hơn 0', 'Thông báo');
                }
                let row = '';
                let stt = 0;
                $.each(data, function (i, item) {
                    stt++;
                    row += `<tr>
                                <td>${stt}</td>
                                <td>${item.code}</td>
                                <td>${item.name}</td>
                                <td>${item.qttOld}</td>
                                <td>${item.price}</td>
                                <td>${item.qttNew}</td>
                                <td><button type="button" class="btn btn-warning btn-sm remove" data-id="${item.id}">Remove</button></td>
                            </tr>`;
                });
                tbody.html(row);
                $('.remove').on('click', function () {
                    let btn = $(this);
                    let id = $(this).data('id');
                    $.each(data, function (i, val) {
                        if (parseInt(id) === val.id) {
                            data.splice(i, 1);
                            btn.parent().parent().remove();
                        }
                    });
                })
            });

            // thêm mớí nguồn nhập
            $('button[name="c-btn"]').click(function () {
                let action = $(this).data('action');
                let token = $('input[name="_token"]').val(), cname = $('input[name="c-name"]').val(),
                    caddress = $('input[name="c-address"]').val();
                let cphone = $('input[name="c-phone"]').val();
                $.post(action, {_token: token, name: cname, address: caddress, phone: cphone}).done(function (rs) {
                    if (rs.status === 'error') {
                        toastr.error(rs.message, 'Error !');
                    }
                    if (rs.status === 'success') {
                        let company = $('<option>', {
                            value: rs.data.id,
                            text: `${rs.data.name} - ${rs.data.address} - ${rs.data.phone}`
                        });
                        $('select[name="company"]').append(company);
                        $('.modal').modal('hide');
                        toastr.success('Add new company success !!', 'Success !');
                    }
                })
            });

            $('button[name="submit"]').off().click(function () {
                let company = parseInt($('select[name="company"]').val());
                let billCode = $('input[name="bill-code"]').val();
                let token = $('input[name="_token"]').val();
                let input = {_token: token, company_id: company, code: billCode, products: data};
                $.ajax({
                    url: $(this).data('route'),
                    dataType: 'json',
                    method: 'POST',
                    data: input,
                    success: function (rs) {
                        if (rs.status === 'success') {
                            toastr.success('Thêm hóa đơn nhập hàng thành công', 'Thông báo');
                            setTimeout(function () {
                                location.href = rs.href;
                            }, 1000);
                        } else {
                            toastr.error('Đã xảy ra lỗi vui lòng kiểm tra lại', 'Thông báo');
                        }
                    }
                });

            });

        });

    </script>
@endsection