@extends('layouts.app')
@section('title','Thêm Hợp Đống')

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
                <div class="row">
                    <div class="col-sm-2">
                        <label for="code">Mã Hợp Đồng</label>
                        <input type="text"  class="form-control" name="code" placeholder="Nhập mã hợp đồng...">
                    </div>
                    <div class="col-sm-4">
                        <label for="name">Tên Khách Hàng</label>
                        <input type="text"  class="form-control" name="name" placeholder="Nhập tên khách hàng...">
                    </div>
                    <div class="col-sm-2">
                        <label for="createddate">Ngày</label>
                        <input type="text" readonly="true" class="form-control" name="createddate" value="{{ date('d/m/Y') }}" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                 <div class="row">
                    <div class="col-sm-2">
                        <label for="product_type">Chọn Loại sản phẩm</label>
                        <select id="product_type"  class="form-control">
                            <option value=""></option>
                            @foreach($productTypes as $productType)
                                <option value="{{ route('ajax.list.products',$productType->id) }}">{{ $productType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" id="fProducts" style="display: none;">
                
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="products">Sản phẩm</label>
                            <select id="products"  class="form-control"  data-plugin="select2" style="width: 100%; height: 20px">
                            </select>
                        </div>
                    </div>
               
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="p-quantity">Số Lượng </label>
                            <input type="number" class="form-control" name="p-quantity" placeholder="Nhập số lượng">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="p-price">Nhập Giá </label>
                            <input type="number" class="form-control" name="p-price" placeholder="Nhập giá">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="p-income">Nhập Tiền Lời </label>
                            <input type="number" class="form-control" name="p-income" placeholder="Nhập Tiền lời 1 Sản phẩm ">
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                        <button type="button" class="btn btn-success" id="add-to-bill">Thêm Sản Phẩm</button>
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
                        <td>Số Lượng</td>
                        <td>Giá Bán</td>
                        <td>Tổng Tiền</td>
                        <td>Tiền Lời</td>
                        <td>Tổng Lời</td>
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
                <button type="button" class="btn btn-success" data-route="{{ route('contracts.store') }}" name="submit">Thêm Hợp Đồng</button>
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
            const ipPri = $('input[name="p-price"]');
            const ipInc = $('input[name="p-income"]');

            const tbody = $('#product-bill tbody');
            $('#product_type').on('change',function () {
                fProducts.slideDown();
                let href = $(this).val();
                if(href){
                    $.get(href).done(function (rs) {
                        if(rs){
                            $.each(rs, function(i,pd){
                                //var img="<img src='"+pd.image+"'>"+"</img>";
                                var value= "id"+":"+pd.id+",code"+":"+pd.code+",name"+":"+pd.name;
                                var text= "<div>Mã:"+ pd.code+"-"+"Tên:"+ pd.name+"</div>" ; 
                                var option ="<option value='"+value+"'" +"style='"+pd.image+"'>"+text+"</option>";
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
                let Price = parseInt(ipPri.val());
                let Income = parseInt(ipInc.val());
                
                if(qttNew > 0 && qttNew != NaN){
                    let item = {id:pd.id, code:pd.code, name:pd.name , quantity:qttNew , price:Price , income:Income };
                    data.push(item);
                    
                }else{
                    toastr.warning('Số lượng nhập phải lớn hơn 0', 'Thông báo');
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
                            <td>${item.quantity}</td>
                            <td>${item.price}</td>
                            <td>${item.quantity * item.price}</td>
                            <td>${item.income}</td>
                            <td>${item.quantity * item.income}</td>
                            
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
                let contractCode = $('input[name="code"]').val();
                let customerName = $('input[name="name"]').val();
                let token = $('input[name="_token"]').val();
                let note = $('textarea[name="note"]').val();
                let input = {_token: token, note: note, code: contractCode, name: customerName, products: data};
                $.ajax({
                    url: $(this).data('route'),
                    dataType: 'json',
                    method: 'POST',
                    data: input,
                    success:function(rs){
                        if(rs.status ==='success'){
                            toastr.success('Thêm Hợp Đồng thành công','Thông báo');
                            setTimeout(function(){ location.href = rs.href;},1000);
                        }else{
                            toastr.error('Đã xảy ra lỗi vui lòng kiểm tra lại Mã Hóa Đơn và Tên Khách Hàng','Thông báo');
                        }
                    }
                });

            });

        });

    </script>
@endsection