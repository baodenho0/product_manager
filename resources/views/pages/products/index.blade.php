@extends('layouts.app')
@section('title','Dashboard')

@section('customCSS')
    <style type="text/css">
         #top{
            padding-bottom: 10px;
            padding-top: 10px;
        }

    </style>
   

@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="row" id="top">
            <div class="col-sm-6">
                <a class="btn btn-success btn-rounded" href="{{ route('products.create') }}">Add new product</a>
            </div>
            <div class="col-sm-6">
                <form class="example" action="{{route('products.search')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <table class="table table-striped table-bordered" id="users">
            <thead>
            <tr>
                <th>ID</th>
                <th>Mã</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thời gian tạo</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td width="200px">
                        <img width="100%" height="auto" src="{{ asset($product->image) }}" alt="">
                    </td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->price)  }}</td>
                    <td>{{ date('d/m/Y H:i',strtotime($product->created_at)) }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning btn-sm"><i
                                    class="ti-pencil"></i> Sửa</a>
                        <button data-href="{{ route('products.destroy',$product->id) }}"
                                data-name="{{ $product->name }}" data-toggle="modal" data-target="#delete"
                                class="btn btn-danger btn-sm"><i class="ti-trash"></i> Xóa
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td style="text-align: center;" colspan="6">Không có sản phẩm nào...</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </div>
    {{-- Modal delete product  --}}
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
    <script type="text/javascript" src="{{ asset('assets/customs/products.js') }}"></script>
@endsection