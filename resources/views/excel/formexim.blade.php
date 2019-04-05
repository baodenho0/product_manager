<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
        <table>
            <thead>
            <tr>
                <td style="text-align:right" colspan="5" >Báo cáo xuất nhập tồn</td>        
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>STT</td>
                <td>Tên Sản Phẩm</td>
                <td>Nhập</td>
                <td>Xuất</td>
                <td>Tồn</td>
            </tr>
                <?php $i = 0; ?>
                    @foreach($oSelect as $o)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$o->product_name}}</td>
                            <td >{{$o->import}}</td>
                            <td >{{$o->export}}</td>
                            <td >{{$o->import - $o->export}}</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>
