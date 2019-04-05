@extends('layouts.app')
@section('title','Khách hàng')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="mb-1">
            <button class="btn btn-success btn-rounded" data-type="add" data-toggle="modal" data-target="#add-client">
                Thêm mới khách hàng
            </button>
        </div>
        <table class="table table-striped table-bordered" id="clients">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Biển số</th>
                <th>Phân khối</th>
                <th>SĐT</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->band}}</td>
                    <td>{{$client->cubic}}</td>
                    <td>{{$client->phone}}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{route('client.editAction',$client->id)}}"></i> Sửa
                        </a>
                        <button data-toggle="modal" data-target="#delete"
                                data-href="{{route('client.delete',$client->id)}}"
                                data-name="{{$client->name}}"
                                class="btn btn-danger btn-sm">
                            <i class="ti-trash"></i> Xóa
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $clients->links('vendor.pagination.bootstrap-4') }}
    </div>
    <div class="modal fade" id="add-client" tabindex="-1" role="dialog" aria-hidden="true">
        @include('pages.clients.create')
    </div>

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
@stop