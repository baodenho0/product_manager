@extends('layouts.app')
@section('title','Dashboard')

@section('customCSS')

@endsection

@section('content')
@if (Auth::user() && (Auth::user()->roles->first()->name == 'admin' || Auth::user()->roles->first()->name=='superadmin'))
<div style="height: 550px">
    <div class="col-sm-6 col-xs-6 col-md-6">
        <div id="chartContainer" >
        </div>
    </div>
    <div class="col-sm-6 col-xs-6 col-md-6">
        <div id="chartContainer2" >
        </div>
    </div>
</div>
@endif
@endsection

@section('customJS')
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    animationEnabled: true,
                    theme: "light2",    // "light1", "dark1", "dark2"
                    title:{
                        text: "Biểu đồ doanh thu năm {{ now()->year }}"
                    },
                    axisX: {
                        title: "Tháng"
                    },
                    axisY: {
                        title: "Đơn vị(VNĐ)"
                    },
                    data: [
                        {
                            type: "column",
                            dataPoints: [
                                <?php
                                $chart="";
                                foreach ($report as $key => $value) {
                                    $chart.='{ label: '.$value->month.', y:'.$value->total."},";
                                }
                                ?>
                                {{ $chart }}
                            ]
                        }
                    ]
                });
            var chart2 = new CanvasJS.Chart("chartContainer2",
                {
                    animationEnabled: true,
                    theme: "light2",    // "light1", "dark1", "dark2"
                    title:{
                        text: "Biểu đồ doanh thu 7 ngày"
                    },
                    axisX: {
                        title: "Ngày"
                    },
                    axisY: {
                        title: "Đơn vị(VNĐ)"
                    },
                    data: [
                        {
                            type: "column",
                            dataPoints: [
                                <?php
                                $chart="";
                                foreach ($report_date as $key => $value) {
                                    $chart.='{ label: "'.$value->date.'", y:'.$value->total."},";
                                }
                                ?>
                                {!! $chart !!}
                            ]
                        }
                    ]
                });

            chart.render();
            chart2.render();
        }
    </script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

@endsection