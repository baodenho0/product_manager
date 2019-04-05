@extends('layouts.app')
@section('title','Thống Kê')

@section('customCSS')
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
@endsection

@section('content')
    <?php $oldBill = 0; $totalBill = 0; $totalMoney = 0;  $totalClient = 0; $client_temp = array(); $clientp_temp = array();?>
    @foreach($oSelect as $o)

        @if(isset($o->prnumber) && $o->bId != $oldBill )
            <?php $totalBill++; $oldBill = $o->bId; $totalMoney += $o->pbPrice ?>
        @elseif($o->bId != $oldBill)
            <?php $totalBill++; $oldBill = $o->bId; $totalMoney += $o->btotal ?>
        @endif




        @if(!in_array($o->cName , $client_temp))
            <?php
            $client_temp[] = $o->cName;
            $clientp_temp[] = $o->cPhone;
            $totalClient++;
            ?>
        @endif

    @endforeach
    <div class="box box-block bg-white clearfix">
        <form action="{{route('report.index')}}" id="form-report" method="POST">
            <div class="form-group">
                {{ csrf_field() }}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="code" id="start">Từ Ngày</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input value="@if($time1!=''){{$time1}} @endif" name="start_time" id="start_time"
                                   type='text' class="form-control"/>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar-o"></i>
                     <span class="glyphicon glyphicon-calendar">
                         </span>
                     </span>
                        </div>
                        <label for="name" id="error1"></label>
                    </div>
                    <div class="col-sm-2">
                        <label for="name" id="end">Đến Ngày</label>
                        <div class='input-group date' id='datetimepicker2'>
                            <input value="@if($time2 !='') {{ $time2 }}@endif" name="end_time" id="end_time" type='text'
                                   class="form-control"/>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar-o"></i>
                     <span class="glyphicon glyphicon-calendar">
                         </span>
                     </span>
                        </div>
                        <label for="name" id="error2"></label>
                    </div>
                    <div class="col-sm-2">
                        <label for="name">Sản Phẩm</label>
                        <select id="product" name="product" class="form-control">
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
                        <label for="name">Khách Hàng</label>
                        <select id="client" name="client" class="form-control">
                            <option value=""></option>
                            @foreach($clients as $item)
                                @if($item->id==$client)
                                    <option selected value="{{$item->id}}">{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="name">NV Kỹ Thuật</label>
                        <select id="user" name="user" class="form-control">
                            <option value=""></option>
                            @foreach($users as $item)
                                @if($item->id==$user)
                                    <option selected value="{{$item->id}}">{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input style="margin-top: 24px" type="submit" class="btn btn-success" name="code"
                               value=" Thống Kê">
                    </div>
                </div>

            </div>
        </form>
        <div class="row" style="margin-bottom: 20px">
            <div class="col-sm-2">
                <label for="name">Tổng Số Bill: </label>
                <input id="result1" class="form-control" value="{{number_format($totalBill)}}" type="text" readonly>
            </div>
            <div class="col-sm-2">
                <label for="name">Doanh Thu: </label>
                <input id="result1" class="form-control" value="{{number_format($totalMoney)}}" type="text" readonly>
            </div>
            <div class="col-sm-2">
                <label for="name">Tổng Khách Hàng: </label>
                <input class="form-control" value="{{$totalClient}}" type="number" readonly>
            </div>
        </div>
        <div class="form-group">
            <table class="table table-hover" id="product-bill">
                <thead>
                <tr>
                    <td>Bill ID</td>
                    <td>Ngày</td>
                    <td>NV Kỹ Thuật</td>
                    <td>NV Thanh Toán</td>
                    <td>Khách Hàng</td>
                    <td>SĐT KH</td>
                    <td>Tên Sản Phẩm</td>
                    <td style="text-align: right;">SL</td>
                    <td style="text-align: right;">Giá</td>
                    <td style="text-align: right;">Thành Tiền</td>
                    <td style="text-align: right;">Giảm giá</td>
                    <td style="text-align: right;">Tổng Bill</td>
                </tr>
                </thead>
                <tbody>
                <?php $old = 0; $i = 0; $bId_temp = 0; $created_at = 0; $uName_temp = "";$cName = ""; $btotal = 0;  ;?>
                @foreach($oSelect as $o)
                    <?php $aa = array();array_push($aa, $o->uName);?>
                    <tr @if($o->bId != $bId_temp)
                        @if($old == 0)
                        style="background: #2e9afe36;"
                        <?php $old = 1;?>
                        @else
                        style="background: #1cb5d999;"
                    <?php $old = 0;?>
                            @endif
                            @endif >
                        <td>@if($o->bId != $bId_temp)

                                {{$o->bId}}
                                <?php $disc_temp = array();$bId_temp = $o->bId; $btotal = 0; $created_at = 0; $uName_temp = "";$cName = "";
                                $client_temps = array(); $user_temps = array(); $casher_temp = array() ; ?>

                            @endif
                        </td>
                        <td>
                            @if($o->bCreated_at != $created_at)
                                {{$o->bCreated_at}}
                                <?php $created_at = $o->bCreated_at ?>
                            @endif
                        </td>
                        <td>

                            @if(!in_array($o->uName , $user_temps))
                                <?php
                                $user_temps[] = $o->uName;

                                ?>
                                {{$o->uName}}
                            @endif
                        </td>
                         <td>

                            @if(!in_array($o->casher , $casher_temp))
                                <?php
                                $casher_temp[] = $o->casher;

                                ?>
                                {{$o->casher}}
                            @endif
                        </td>
                        <td>
                            @if(!in_array($o->cName , $client_temps))
                                <?php
                                /*$client_temps[] = $o->cName;*/
                                ?>
                                {{$o->cName}}
                            @endif
                        </td>
                        <td>
                            @if(!in_array($o->cName , $client_temps))
                                <?php
                                $client_temps[] = $o->cName;
                                ?>
                                {{$o->cPhone}}
                            @endif
                        </td>
                        <td>{{$o->product_name}}</td>
                        <td style="text-align: right;">{{$o->pQuantity}}</td>
                        <td style="text-align: right;">{{number_format($o->pbPrice)}}</td>
                        <td style="text-align: right;">{{number_format(($o->pQuantity)*($o->pbPrice))}}</td>
                        <td style="text-align: right;">

                            @if(!in_array($o->disc , $disc_temp))
                                <?php
                                $disc_temp[] = $o->disc;
//                                foreach ($aa as $value) {
//                                    echo " $value <br />";
//                                }
                                ?>
                                {{--@if(count($aa)==1)
                                    {{ (($o->pQuantity)*($o->pbPrice)/100)*($o->disc) }}
                                @else--}}
                                    {{--{{ number_format((($o->disc)*($o->btotal))  }} VNĐ  ({{$o->disc}} %)--}}
                                {{--@endif--}}
                                @if((100-$o->disc )!=0)
                                    {{number_format(((($o->btotal)*100)/(100-$o->disc ))*($o->disc/100))}} ({{$o->disc}}%)
                                    @else
                                    0%
                                    @endif
                            @endif
                        </td>
                        <td style="text-align: right;">
                            @if(isset($o->prnumber))
                                {{number_format(($o->pQuantity)*($o->pbPrice))}}
                            @else
                                @if($o->btotal != $btotal )
                                    {{ number_format($o->btotal) }}
                                    <?php $btotal = $o->btotal ?>
                                @endif
                            @endif
                        </td>
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