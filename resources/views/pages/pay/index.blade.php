@extends('layouts.app')
@section('title','Thanh Toán')

@section('customCSS')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>

<style type="text/css">
@media print {
    .no-print, .no-print * {
        display: none !important;
    }

}

@media screen {
    .align-print {
        text-align: right;
    }

}

.serviceId {
    display: none
}

</style>
@endsection

@section('content')
<div class="row">

    <div class="box box-block bg-white clearfix">
        <div class="col-sm-12">
            <form action="" id="myForm" method="POST">
                <div class="form-group">
                    {{ csrf_field() }}
                </div>
                <div class="form-group row">
                    <label style="width: 110px" class="col-sm-2 col-form-label no-print" for="searchName">Tìm
                    KH</label>
                    <div class="col-sm-3">
                        <select class="col-sm-3 form-control" id="searchClient" name="searchClient"
                        onchange="changeSearchClient()"></select>
                    </div>
                    <div class="col-sm-1">
                        <input type="button" style="width: 70px;height: 30px" value="Thêm" data-type="add"
                        data-toggle="modal" data-target="#add-client" id="btn-add"
                        class="btn btn-danger no-print">
                    </div>

                </div>
                <div class="form-group row">
                    <label style="width: 110px" class="col-sm-2 col-form-label" for="name">Khách Hàng</label>
                    <div class="col-sm-2">
                        <input type="text" class="col-sm-4 form-control" id="name" name="name"
                        placeholder="Tên Khách Hàng" readonly="readonly">
                    </div>
                    <label style="width: 80px" class="col-sm-1 col-form-label" for="phone">SĐT</label>
                    <div class="col-sm-2">
                        <input type="text" class="col-sm-4 form-control" id="phone" name="phone"
                        placeholder="Số Điện Thoại" readonly>
                    </div>


                </div>
                <div class="form-group row">
                    <label style="width: 110px" class="col-sm-2 col-form-label" for="cubic">Phân Khối</label>
                    <div class="col-sm-2">
                        <input type="text" class="col-sm-4 form-control" id="cubic" name="cubic"
                        placeholder="Phân Khối">
                    </div>
                    <label style="width: 80px" class="col-sm-2 col-form-label" for="band">Biển Số</label>
                    <div class="col-sm-2">
                        <input type="text" class="col-sm-4 form-control" id="band" name="band"
                        placeholder="Biển Số" readonly>
                    </div>

                </div>
                <div class="form-group row">
                    <label style="width: 110px" class="col-sm-2 col-form-label" for="service">Kỹ Thuật</label>
                    <div class="col-sm-2">
                        <select id="user" style="width: 100%" name="user" placeholder="Nhập Tên Nhân Viên" required>
                            @foreach($staffs as $staff)
                            <option value="{{$staff->id}}">{{$staff->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label style="width: 80px" class="col-sm-2 col-form-label" for="service">Dịch Vụ</label>
                        <div class="col-sm-3">
                            <select id="service" style="width: 100%" name="service" placeholder="Nhập Tên Dịch Vụ">
                                @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary no-print" id="addService">Thêm dịch vụ
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-7">
                            <div id="printTableArea">
                                <table class="table table-striped" id="order">
                                    <thead>
                                        <tr style="background-color: #76fe7a;">
                                            <td style="display: none">Id</td>
                                            <td style="width: 2%">No</td>
                                            <td style="width: 48%">Tên DV</td>
                                            <td style="width: 5%">SL</td>
                                            <td style="width: 20%" align="right">Giá</td>
                                            <td style="width: 25%" align="right">Thành Tiền</td>
                                            <td class="actionTd"></td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="background-color: #ffc80082;" align="right"><b>Tổng tiền: </b>
                                            </td>
                                            <td colspan="2" style="background-color: #ffc80082;" align='right'><b><span
                                                id="total"></span></b> VNĐ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="background-color: #ffc80082;" align="right"><b>Giảm %: </b>
                                            </td>
                                            <td colspan="2" style="background-color: #ffc80082;" align='right'>
                                                <input style="width: 100px" id="input-discount" min="0" max="100"
                                                type="number" class="form-control" value="0"
                                                placeholder="Giảm %">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="background-color: #ffc80082;" align="right"><b>Tiền giảm: </b>
                                            </td>
                                            <td colspan="2" style="background-color: #ffc80082;" align='right'><b><span
                                                id="money-discount"></span></b> VNĐ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="background-color: #ffc80082;" align="right"><b>Tổng tiền sau
                                            giảm: </b>
                                        </td>
                                        <td colspan="2" style="background-color: #ffc80082;" align='right'><b><span
                                            id="a-discount"></span> VNĐ</b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <table class="table table-striped table-hover no-print" id="temp">
                                <thead>
                                    <tr style="background-color: #76fe7a;">
                                        <th>Họ Tên</th>
                                        <th>SĐT</th>
                                        <th>Biển số</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                    <tr class='clickable-row' id="temptable{{$client->phone}}">
                                        <td class='namee'>{{$client->name}}</td>
                                        <td class='phonee'>{{$client->phone}}</td>
                                        <td class='bandd'>{{$client->band}}</td>
                                        <td class='revise'>
                                            <button type="button" class="viewTemp btn btn-primary">Xem</button>
                                            {{--<button type="button" class="deleteTemp btn btn-primary">Xóa</button>--}}
                                            <button type="button" class="deleteTemp btn btn-primary del"
                                            data-toggle="modal"
                                            data-target="#modal-enter-password">Xóa
                                        </button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal modal-client fade" id="add-client" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"> Thêm Khách Hàng</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>
                            <div class="form-group" id="link_url">
                                <label for="url">SĐT</label>
                                <input type="text" class="form-control" name="c-phone"
                                placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <label for="title">Họ tên khách hàng</label>
                                <input type="text" class="form-control" name="c-name"
                                placeholder="Họ tên khách hàng">
                            </div>
                            <div class="form-group">
                                <label for="title">Biển số</label>
                                <input type="text" class="form-control" name="c-band"
                                placeholder="Biển số xe...">
                            </div>
                            <div class="form-group">
                                <label for="title">Phân khối xe</label>
                                <input type="number" class="form-control" name="c-cubic"
                                placeholder="Phân khối xe">
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-secondary btn-rounded" data-dismiss="modal">Hủy</a>
                                <button type="button" class="btn btn-success"
                                data-action="{{ route('client.store') }}"
                                name="c-btn">Thêm
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @php
        $printImage=url('images/icons8-print-48.png');
        $saveTempImage=url('images/Save-as-icon.png');
        $checkOutImage=url('images/Check.png');
        @endphp
        <div class="form-group pull-left">
            <img src="{{ $saveTempImage}}" style="height: 60px;width: 80px;margin-right: 10px"
            class="btn btn-warning no-print" name="saveTemp" id="saveTemp" title="Lưu tạm thời">
        </img>
        <img style="height: 60px;width: 80px;margin-right: 10px" type="button" src="{{$printImage}}"
        class="btn btn-success no-print"
        onclick="PrintDiv('Hóa Đơn Tạm Tính','Quý khách vui lòng không thanh toán hóa đơn tạm tính.')"
        name="submit" title="In tạm thời">
    </img>
    <img id="btnCheckOut" src="{{$checkOutImage}}"
    style="height: 60px;width: 80px;margin-right: 10px" class="btn btn-danger no-print"
    title="Thanh toán"
    data-toggle="modal" data-target="#checkOutQ">
</img>
</div>
</form>
</div>

</div>
</div>

<!-- Modal -->
<div id="checkOutQ" class="modal fade small-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p class="message">Bạn có muốn thanh toán<strong>!</strong></p>
            </div>
            <div class="modal-footer">
                <button name="submit" onclick="onPrintFinished(PrintDiv('Hóa Đơn Thanh Toán'))" id="okCheckOuts"
                type="button" data-dismiss="modal" class="btn btn-primary btn-rounded">Thanh toán
            </button>
            <button type="button" data-dismiss="modal" class="btn btn-secondary btn-rounded">Không
            </button>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="modal-enter-password" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nhập Password</h4>
            </div>
            <div class="modal-body">
                <input id="password-delete-pay-temp" type="password" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" id="okPassword" class="btn btn-success">OK</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="noUserInfoModal" class="modal fade small-modal" tabindex="-1" role="dialog" id="delete" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Không tìm thấy thông tin khách hàng<strong>!</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary btn-rounded">OK</button>
            </div>
        </div>
    </div>
</div>
<div id="checkOutModal" class="modal fade small-modal" tabindex="-1" role="dialog" id="delete" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p class="message">Thanh toán không thành công<strong>!</strong></p>
            </div>
            <div class="modal-footer">
                <button id="checkOutOk" type="button" data-dismiss="modal" class="btn btn-primary btn-rounded">OK
                </button>
            </div>
        </div>
    </div>
</div>
<div id="noDataToPrint" class="modal fade small-modal" tabindex="-1" role="dialog" id="delete" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Không có dữ liệu để in<strong>!</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary btn-rounded">OK</button>
            </div>
        </div>
    </div>
</div>
<div id="deleteService" class="modal fade small-modal" tabindex="-1" role="dialog" id="delete" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <p>Ban có muốn xóa <strong></strong> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnOk" data-dismiss="modal" class="btn btn-primary btn-rounded">OK
                </button>
                <button type="button" class="btn btn-secondary btn-rounded" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
<div id="divToPrint" style="display: none;">
    <page id="PrintArea">
        <div>
            <center>

                <img src="http://pklwash.likegroup.vn/images/logo.jpg" width="100px" height="30px">
                <br/><br/>
                ĐC: 40b Linh Đông, P.Linh Đông, Thủ Đức, HCM <br/>
                Điện thoại: 0985 04 23 05 <br/>
                ............................<br/><br/>

                <font size="3" id="billTitle"><b>Hóa Đơn Thanh Toán</b></font><br/><br/>

            </center>


            &nbsp&nbsp&nbsp Khách Hàng: <label id="printClient"></label><br/>
            &nbsp&nbsp&nbsp SĐT: <label id="printPhone"></label><br/>
            &nbsp&nbsp&nbsp Biển Số: <label id="printBand"></label><br/>
            &nbsp&nbsp&nbsp Phân Khối: <label id="printCubic"></label><br/><br/>
            &nbsp&nbsp&nbsp NV Kỹ Thuật: <label id="printUser"></label><br/>
            &nbsp&nbsp&nbsp NV Thu Ngân: <label
            id="printCreditUser">{{\Illuminate\Support\Facades\Auth::user()->name}}</label><br/><br/>
            <div align='right'><span>Ngày: {{ date("d/m/Y h:i") }}</span></div>
        </div>
        <div id="printTable">

        </div>
        <br/><br/>
        <center id="billNotice"></center>
        <center>
            <h3>Chúc quý khách thượng lộ bình an!</h3>
        </center>
    </page>
    @foreach($pass as $p)
    <input type="hidden" value="{{$p->value}}" id="pass-hide">
    @endforeach
    @endsection

    @section('customJS')

    <script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js"></script>
    <script>

        $('button[name="c-btn"]').click(function () {
            let action = $(this).data('action');
            let token = $('input[name="_token"]').val(),
            cname = $('input[name="c-name"]').val();
            let cphone = $('input[name="c-phone"]').val();
            let cband = $('input[name="c-band"]').val();
            let ccubic = $('input[name="c-cubic"]').val();
            $.post(action, {
                _token: token,
                name: cname,
                phone: cphone,
                cubic: ccubic,
                band: cband
            }).done(function (rs) {
                if (rs.type === 'error') {
                    toastr.error(rs.message, 'Error !');
                }
                if (rs.type === 'success') {
                    $('.modal-client').modal('hide');
                    toastr.success('Thêm khách hàng thành công!', 'Success !');
                }
            })
        });

        function ClearAll() {
            $("#order tbody").empty();
            $("#name").val('');
            $("#phone").val('');
            $("#band").val('');
            $("#cubic").val('');
            $("#total").text('');
            $("#d-discount").text('');
            $("#a-discount").text('');
            $("#money-discount").text('');
            $("#input-discount").val(0);

        }

        function DeleteService(e) {
            $('#deleteService').modal('show');
            var btn = $(e.relatedTarget);
            var id = $(e).parent().parent().find(".serviceId").text();
                    //var name = btn.data('name');
                    //var href = btn.data('href');
                    $(this).find('.modal-body strong').text(name);
                    $('#btnOk').off().click(function () {
                        //toastr.success(rs.message,'Xóa Thành Công !');
                        $(e).parent().parent().remove();
                        /*$.ajax({
                            url: "{{route('delete-service')}}",
                method: 'post',
                data: {idd:id,phone:$("#phone").val(), _token : '{{ csrf_token() }}' },
                success: function(rs){
                    //if(rs.status === 'success'){
                        //toastr.success(rs.message,'Thông báo !');
                        $(e).parent().parent().remove();
                    //}else{
                        //toastr.error(rs.message,'Thông báo !')
                    //}
                }
            });*/
        });
                }

                jQuery.fn.insertAt = function (index, element) {
                    var lastIndex = this.children().size();
                    if (index < 0) {
                        index = Math.max(0, lastIndex + 1 + index);
                    }
                    this.append(element);
                    if (index < lastIndex) {
                        this.children().eq(index).before(this.children().last());
                    }
                    return this;
                }

                function FormatNumber($num) {
                    return $.number($num, 0, '.', ',');
                }

                function PrintDiv($billTitle, $billNotice = "") {
                    $("#billTitle").text($billTitle);
                    $("#billNotice").text($billNotice);
                    var hasData = $('#order > tbody > tr');

                    var divToPrint = $('#divToPrint');
                    if (hasData.length <= 0 || ($("#name").val() == null || $("#name").val() == "")) {
                        $('#noDataToPrint').modal('show');
                        return;
                    }
                    $("#printUser").text($('#user').select2('data')[0]['text']);
                    $("#printClient").text($("#name").val());
                    $("#printPhone").text($("#phone").val());
                    $("#printBand").text($("#band").val());
                    $("#printCubic").text($("#cubic").val());
                    $("#printTable").empty();
                    $("#printTableArea").clone().appendTo("#printTable");
                    $("#printTable #order").attr("id", "printOrder");
                    $('#printOrder > thead > tr .actionTd').css("display", "none");
                    var rows = $('#printOrder > tbody > tr');
                    for (var i = 0; i < rows.length; i++) {
                        $(rows[i]).find(".action").css("display", "none");
                        $(rows[i]).find('.serviceQuantity').find('.productQuantity').css("display", "none");
                        $(rows[i]).find('.serviceQuantity').text($(rows[i]).find('.serviceQuantity').find('.productQuantity').val());
                    }
                    //$( "#printTable" ).load( "{{route('order-table')}}" );
                    //$("#printTableArea").clone().appendTo("#orderArea");
                    printJS({
                        font_size: '8pt',
                        honorMarginPadding: false,
                        printable: 'PrintArea',
                        documentTitle: 'Hóa Đơn',
                        type: 'html',
                        header: ''
                    });
                    //var popupWin = window.open('', '_blank');
                    //popupWin.document.open();
                    //popupWin.document.write('<html><body onload="window.print()">' + $(divToPrint).html() + '</html>');
                    //popupWin.document.close();

                }

                var onPrintFinished = function (printed) {
                    //$('#btnCheckOut').data('clicked', true);
                    //if($('#btnCheckOut').data('clicked'))
                    //{
                        CheckOut();
                    //$('#btnCheckOut').data('clicked', false);
                    //}
                }

                function changeSearchClient() {
                    $.ajax({
                        type: "GET",
                        url: "{{route('get-client-by-phone')}}",
                        data: {
                            phone: $("#searchClient option:selected").val()
                        },
                        success: function (data) {
                            if (data == null || data == "") {
                                $("#noUserInfoModal").modal("show");
                            }
                            $("#order tbody").empty(); // đây nek a
                            $("#name").val(data.name);
                            $("#phone").val(data.phone);
                            $("#band").val(data.band);
                            $("#cubic").val(data.cubic);
                        }
                    });
                    ClearAll();
                }

                $(function () {
                    $("#searchClient").select2({
                        ajax: {
                            url: "{{route('get-clients-by-phone')}}",
                            dataType: 'json',
                            type: "GET",
                            quietMillis: 50,
                            data: function (params) {
                                var query = {
                                    search: params.term,
                                    type: 'public'
                                }

                                // Query parameters will be ?search=[term]&type=public
                                return query;
                            },
                            processResults: function (data) {
                                // Tranforms the top-level key of the response object from 'items' to 'results'
                                return {
                                    results: $.map(data, function (item) {
                                        return {
                                            text: item.phone + "-" + item.name + " - " + item.band,
                                            id: item.phone
                                        }
                                    })
                                };
                            }
                        }
                    });
                    $('#service').select2();
                    $('#user').select2();
                    $('#temp').on('click', '.clickable-row .del', function (event) {
                        var phonee = $($($(event)[0].currentTarget).parent()).parent().find(".phonee").text();
                        const pass = $('#password-delete-pay-temp');
                        const passHide = $('#pass-hide');
                        $('#okPassword').click(function () {
                            if (pass.val() == passHide.val()) {
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('delete-temp')}}",
                                    data: {
                                        phone: phonee,
                                        _token: "{{csrf_token()}}"
                                    },
                                    success: function (data) {
                                        if (data.error_code == 0) {
                                            $("#checkOutModal").find(".message").text("Xóa bảng tạm thành công!");
                                            $("#checkOutModal").modal('show');
                                            $('#checkOutOk').off().click(function () {
                                                $($($(event)[0].currentTarget).parent()).parent().remove();
                                                ClearAll();
                                            });
                                            $("#modal-enter-password").modal('hide');
                                            $('#password-delete-pay-temp').val('');
                                        }
                                        else {
                                            //console.log(data);
                                            $("#checkOutModal").find(".message").text("Xóa bảng tạm không thành công!");
                                            $("#checkOutModal").modal('show');
                                            $('#password-delete-pay-temp').val('');

                                        }
                                    }
                                });
                            } else {
                                alert('Vui lòng nhập lại password!');
                                pass.val('');
                            }
                        });
                    });
                    $('#temp').on('click', '.clickable-row .viewTemp', function (event) {
                        var phonee = $($($(event)[0].currentTarget).parent()).parent().find(".phonee").text();
                        $.ajax({
                            type: "GET",
                            url: "{{route('get-order-by-phone')}}",
                            data: {
                                phone: phonee.trim(),
                                _token: "{{csrf_token()}}"
                            },
                            success: function (data) {
                                console.log(data);
                                $('#user').val(data.user).trigger('change');
                                //$("#user option[value='"+data.user+"']").attr("selected", "selected");
                                $("#name").val(data.clientName);
                                $("#phone").val(phonee.trim());
                                $("#band").val(data.band);
                                $("#cubic").val(data.cubic);
                                $("#input-discount").val(data.discount);
                                $("#order tbody").empty();
                                var count = 0;
                                for (var j = 0; j < data.services.length; j++) {
                                    if (data.services[j] != null) {
                                        count = count + 1;
                                        var stt = "<td class='orderNumber' style='width:1%' align='center'>" + count + "</td>";
                                        var id = "<td class='serviceId'>" + data.services[j].serviceId + "</td>";
                                        var name = "<td class='serviceName' style='width:40%'>" + data.services[j].serviceName + "</td>";
                                        var quantity = "<td  class='serviceQuantity' align='center' >" + "<input style='width:50px' class='productQuantity' onchange='ChangeQuantity(this)' type='number' min='1' value='" + data.services[j].productQuantity + "'/>" + "</td>";
                                        var price = "<td class='price' align='right' style='width:20%' ><lable >" + FormatNumber(data.services[j].productPrice) + "</lable></td>";
                                        var rowTotal = "<td class='rowTotal' align='right' style='width:25%' >" + FormatNumber(ReplaceCommaToEmpty(data.services[j].productPrice) * data.services[j].productQuantity) + "</td>";
                                        var action = "<td class='action'>" + "<button type='button' onclick='DeleteService(this)' class='delete btn btn-danger'><i class='ti-trash'></i></button></td>";
                                        var row = "<tr>" + stt + id + name + quantity + price + rowTotal + action + "</tr>";
                                        $("#order tbody").insertAt(data.services.length, row);
                                        var total = CountTotal();
                                        $("#total").text(FormatNumber(total));
                                        var moneydiscount = total * (data.discount / 100);
                                        $('#money-discount').text(FormatNumber(moneydiscount));
                                        $('#a-discount').text(FormatNumber(total - moneydiscount));
                                        // var afterDiscount=CountTotalAfter();
                                        // $('#a-discount').text(FormatNumber(afterDiscount));
                                    }
                                }
                            }
                        });
                    });
                });

function ChangeQuantity(th) {
    var rowTotal = parseInt(ReplaceCommaToEmpty($(th).parent().parent().find(".price").text())) * parseInt($(th).val());
    $(th).parent().parent().find(".rowTotal").text(FormatNumber(rowTotal));
    var total = CountTotal();
    $("#total").text(FormatNumber(total));
    var afterDiscount = CountTotalAfter();
    $('#a-discount').text(FormatNumber(afterDiscount));
    $('#money-discount').text(FormatNumber(total - afterDiscount));
}

function ReplaceCommaToEmpty(num) {
    return num.replace(/,/gi, "");
}

function CountTotal() {
    var rows = $('#order > tbody > tr > td.rowTotal');
    var total = 0;
    for (var i = 0; i < rows.length; i++) {
        total = parseInt(total) + parseInt(ReplaceCommaToEmpty(rows[i].innerText));
    }

    return total;
}

function CountTotalAfter() {
    var rows = $('#order > tbody > tr > td.rowTotal');
    var total = 0;
    for (var i = 0; i < rows.length; i++) {
        total = parseInt(total) + parseInt(ReplaceCommaToEmpty(rows[i].innerText));
    }
    var rs = total - total * ($('#input-discount').val() / 100);
    return rs;
}

$('#addService').click(function () {

    var disCount = $('#discount').val();
    var ddisCount = $('#d-discount');
    ddisCount.text(disCount);
    var phone = $("#phone").val();

    if(phone==""){
        alert("Vui lòng chọn khách hàng!!");
        return;
    }

    $.ajax({
        type: "GET",
        url: "{{route('get-service-by-id')}}",
        data: {
            id: $('#service').val()
        },
        success: function (data) {

            var rows = $('#order > tbody > tr');
            var totalQuantity = 1;
            var stt = 0;
            var existId = false;
            for (var i = 0; i < rows.length; i++) {
                var idd = $(rows[i]).find('.serviceId').text();
                if (idd == data.id) {
                    existId = true;
                    totalQuantity += parseInt($(rows[i]).find('.productQuantity').val());
                    $(rows[i]).remove();
                }
            }
            if (rows.length == 0) {
                stt = 1;
            }
            else if (existId == false) {
                stt = parseInt($(rows[rows.length - 1]).find('.orderNumber').text()) + 1;
            }
            if (existId == true) {
                stt = parseInt($(rows[rows.length - 1]).find('.orderNumber').text());
            }
            var stt = "<td class='orderNumber'style='width:1%'>" + stt + "</td>";
            var id = "<td class='serviceId' >" + data.id + "</td>";
            var name = "<td class='serviceName' style='width:40%'>" + data.name + "</td>";
            var quantity = "<td class='serviceQuantity'>" + "<input style='width:50px' class='productQuantity' onchange='ChangeQuantity(this)' type='number' min='1' value='" + totalQuantity + "'/>" + "</td>";
            var price = "<td class='price' style='width:25%; text-align:right'>" + FormatNumber(data.price) + "</td>";
            var rowTotal = "<td class='rowTotal' style='width:30%; text-align:right'>" + FormatNumber(data.price * totalQuantity) + "</td>";
            var action = "<td class='action'>" + "<button type='button' onclick='DeleteService(this)' class='delete btn btn-danger'>" + "Xóa" + "</button></td>";
            var row = "<tr>" + stt + id + name + quantity + price + rowTotal + action + "</tr>";
            $("#order tbody").insertAt(rows.length, row);
            var total = CountTotal();
            $("#total").text(FormatNumber(total));
            var afterTotal = CountTotalAfter();
            $("#money-discount").text(FormatNumber(total - afterTotal));
            $('#a-discount').text(FormatNumber(afterTotal));
        }
    });


});
$('#btn-search').click(function () {
    $.ajax({
        type: "GET",
        url: "{{route('get-client-by-phone')}}",
        data: {
            phone: $('#searchClient').val()
        },
        success: function (data) {
            if (data == null || data == "") {
                $("#noUserInfoModal").modal("show");
            }
            $("#order tbody").empty();
            $("#name").val(data.name);
            $("#phone").val(data.phone);
            $("#band").val(data.band);
            $("#cubic").val(data.cubic);
        }
    });
});
$('#saveTemp').click(function () {

    var rows = $('#order > tbody > tr');
    var services = [];
    var userr = $("#user").val();
    var bandd = $("#band").val();
    var cubicc = $("#cubic").val();
    var phone = $("#phone").val();
    var discountt = $('#input-discount').val();
    if(phone=""){
        alert("Vui lòng chọn khách hàng!!");
        return;
    }
    if(rows.length<1){
        alert("Không có sản phẩm để lưu tạm!!");
        return;
    }
    for (var i = 0; i < rows.length; i++) {
        var idd = $(rows[i]).find('.serviceId').text();
        if (idd != null) {
            var name = $(rows[i]).find('.serviceName').text();
            var quantity = $(rows[i]).find('.productQuantity').val();
            var price = $(rows[i]).find('.price').text();
            services[idd] = {
                serviceId: idd,
                serviceName: name,
                productQuantity: quantity,
                productPrice: ReplaceCommaToEmpty(price)
            }

        }

    }
    $.ajax({
        type: "POST",
        url: "{{route('save-order')}}",
        data: {
            services: services,
            band: bandd,
            cubic: cubicc,
            user: userr,
            discount: discountt,
            phone: $('#phone').val(),
            _token: "{{csrf_token()}}"
        },
        success: function (data) {
                            //location.reload();
                            if (data.error_code == 0) {
                                $("#checkOutModal").find(".message").text("Lưu tạm thành công!");
                                $("#checkOutModal").modal('show');
                                var rows = $('#temp > tbody > tr');
                                for (var i = 0; i < rows.length; i++) {
                                    $(rows[i]).attr("id","temptable"+$("#phone").val());
                                    var phonee = $(rows[i]).find('.phonee').text();
                                    if ($("#phone").val() == phonee) {
                                        ClearAll();
                                        $("#searchClient").val('');
                                        return;
                                    }
                                }
                                var name = "<td class='namee'>" + $("#name").val() + "</td>";
                                var phone = "<td class='phonee'>" + $("#phone").val() + "</td>";
                                var band = "<td class='bandd'>" + $("#band").val() + "</td>";
                                var revise = "<td class='revise'>" + "<button type='button' class='btn btn-primary viewTemp'>" + "Xem" + "</button>" +
                                " <button type='button' class='deleteTemp btn btn-primary del' data-toggle='modal' data-target='#modal-enter-password'>" + "Xóa" + "</button></td>";
                                var row = "<tr class='clickable-row'>" + name + phone + band + revise + "</tr>";
                                $("#temp tbody").prepend(row);
                                ClearAll();
                                $("#searchClient").val('');
                            }
                            else
                            {
                                  $("#checkOutModal").find(".message").text("Lưu tạm không thành công:"+data.message+"!");
                                  $("#checkOutModal").modal('show');
                            }
                        }
                    });
});

function CheckOut() {
    var tt = CountTotalAfter;
    var rows = $('#order > tbody > tr');
    var services = [];
    var userr = $("#user").val();
    var bandd = $("#band").val();
    var cubicc = $("#cubic").val();
    var discountt = $('#input-discount').val();
    for (var i = 0; i < rows.length; i++) {
        var idd = $(rows[i]).find('.serviceId').text();
        if (idd != null) {
            var name = $(rows[i]).find('.serviceName').text();
            var quantity = $(rows[i]).find('.productQuantity').val();
            var price = $(rows[i]).find('.price').text();
            services[idd] = {
                serviceId: idd,
                serviceName: name,
                productQuantity: quantity,
                productPrice: ReplaceCommaToEmpty(price)
            };
        }
    }
    $.ajax({
        type: "POST",
        url: "{{route('save-order')}}",
        data: {
            services: services,
            band: bandd,
            cubic: cubicc,
            user: userr,
            discount: discountt,
            phone: $('#phone').val(),
            _token: "{{csrf_token()}}"
        },
        success: function()
        {
             $.ajax({
            type: "POST",
            url: "{{route('order.checkout')}}",
            data: {
                            //user:$("#user").val();
                            //band:$("#band").val();
                            //cubic:$("#cubic").val();
                            discountss: $('#input-discount').val(),
                            phone: $('#phone').val(),
                            totalss: tt,
                            _token: "{{csrf_token()}}"
                        },
                        success: function (data) {
                            if (data.error_code == 0) {
                                $("#checkOutModal").find(".message").text("Thanh toán thành công!");
                                $("#checkOutModal").modal('show');
                                $('#checkOutOk').off().click(function () {
                                    location.reload();
                                    //$("#temptable"+$('#phone').val()).remove();
                                });

                            }
                            else {
                                //console.log(data);
                                $("#checkOutModal").find(".message").text("Thanh toán không thành công!");
                                $("#checkOutModal").modal('show');
                            }
                        }
                    });
        }
    });
   
}
</script>
<script>
    $('#input-discount').change(function () {
        var afterTotal = CountTotalAfter();

        $("#a-discount").text(FormatNumber(afterTotal));
        $('#money-discount').text(FormatNumber(CountTotal() - afterTotal));
    });

</script>
<script type="text/javascript">

</script>
@endsection
