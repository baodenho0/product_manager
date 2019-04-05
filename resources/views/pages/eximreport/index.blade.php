@extends('layouts.app')
@section('title','Thống Kê Xuất Nhập T')

@section('customCSS')
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    
@endsection

@section('content')
   
    <div class="box box-block bg-white clearfix">
        <form action="{{route('eximreport.index')}}" id="form-report" method="POST">
            <div class="form-group">
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="code" id="start">Từ Ngày</label>
                        <input class="form-control" type="date" name="start_time"
                                 value="{{$time1}}" id="start_time">
                        <label for="name" id="error1"></label>
                    </div>
                    <div class="col-sm-2">
                        <label for="code" id="start">Đến Ngày</label>
                        <input class="form-control" type="date" name="end_time"
                                 value="{{$time2}}" id="end_time">
                        <label for="name" id="error1"></label>
                    </div>
                    <div class="col-sm-3">
                        <label for="name">Sản Phẩm</label>
                        <select id="product" name="product" class="form-control" ">
                            <option value=""></option>
                            @foreach($products as $item)
                                @if($item->id == $product)
                                    <option selected value="{{$item->id}}">{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-sm-2">
                        <input style="margin-top: 24px; float: right; " type="submit" class="float-right btn btn-success" name="report"
                               value="Thống Kê">
                    </div>
                    <div class="col-sm-3 ">
                        <input style="margin-top: 24px; float: right; " type="submit" class="btn btn-success" name="excel"
                               value="Xuất file Excel">
                    </div>
                </div>

            </div>
        </form>
        
        <div class="form-group table-responsive">
            <table class="table table-hover" id="product-bill">
                <thead>
                <tr style="background: ">
                    <td>STT</td>
                    <td>Tên Sản Phẩm</td>
                    <td>Nhập</td>
                    <td>Xuất</td>
                    <td>Tồn</td>
                </tr>
                </thead>
                <tbody>
                <?php $old=0; $i = 0;  $bId_temp = 0; $created_at = 0; $uName_temp = "";$cName = ""; $btotal = 0;?>
                @foreach($oSelect as $o)
                    <?php $i++; ?>
                    <tr     @if($old == 0)
                                style="background: #2e9afe36;" 
                                <?php $old = 1;?>
                            @else
                                style="background: #1cb5d999;"
                                <?php $old = 0;?>
                            @endif
                    >
                        <td>{{$i}}</td>
                        <td>{{$o->product_name}}</td>
                        <td >{{$o->import}}</td>
                        <td >{{$o->export}}</td>
                        <td >{{$o->inventories}}</td>
                        

                        
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('customJS')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/customs/report.js')}}"></script>
@stop