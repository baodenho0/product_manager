@extends('layouts.app')
@section('title','Công Ty')

@section('customCSS')
@endsection

@section('content')
    <div class="box box-block bg-white">
        <div class="mb-1">
            <button class="btn btn-success btn-rounded" data-type="add" data-toggle="modal" data-target="#add-companies">
                Thêm mới công ty
            </button>
        </div>
        <table class="table table-striped table-bordered" id="clients">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên công ty</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{route('companies.editAction',$item->id)}}"></i> Sửa
                        </a>
                        <button data-toggle="modal" data-target="#delete"
                                data-href="{{route('companies.delete',$item->id)}}"
                                data-name="{{$item->name}}"
                                class="btn btn-danger btn-sm">
                            <i class="ti-trash"></i> Xóa
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="add-companies" tabindex="-1" role="dialog" aria-hidden="true">
        @include('pages.companies.add')
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
    <script type="text/javascript" src="{{ asset('assets/customs/companies.js') }}"></script>
@stop
