@extends('layouts.app')
@section('title','Menus')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('assets/vendor/nestable/nestable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <style>
        .dd {
            max-width: 100%;
        }

        .dd-button {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            padding: 5px 20px 5px 0px;
        }
    </style>
@endsection

@section('content')
    <div class="box box-block bg-white">
        <h5 class="mb-2">
            <button class="btn btn-success btn-rounded" data-type="add" data-toggle="modal" data-target="#add-items">
                Thêm menu item mới
            </button>
        </h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="dd" id="menuItems"
                     data-href="{{ route('menu-builder.update', request()->route('menuId')) }}">
                    @include('pages.menus.child',['menuItems'=>$menuItems])
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-items" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form id="form-menu-item"
                          action="{{ route('menu-item.store',['itemId' =>request()->route('menuId')]) }}" method="POST"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            {{ csrf_field() }}
                        </div>
                        <div class="form-group">
                            <label for="title">Title of the Menu Item</label>
                            <input type="text" class="form-control" name="title" placeholder="Title...">
                        </div>
                        <div class="form-group">
                            <label for="class-icon">Font Icon class for the Menu Item</label>
                            <input type="text" class="form-control" name="class-icon"
                                   placeholder="Icon Class (optional)">
                        </div>
                        <div class="form-group">
                            <label for="link-type">Link type</label>
                            <select name="link-type" id="select" class="form-control">
                                <option value="url" id="option-url">Static URL</option>
                                <option value="route" id="option-route">Dynamic Route</option>
                            </select>
                        </div>
                        <div class="form-group" id="linkurl">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" name="url" placeholder="URL">
                        </div>
                        <div class="form-group" id="linkroute" style="display:none">
                            <label for="route">Route name</label>
                            <input value="dashboard" type="text" class="form-control" name="route" placeholder="Route">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="target">Open In</label>
                            <select name="target" class="form-control">
                                <option value="">Same Tab/Window</option>
                                <option value="_blank">New Tab/Window</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Icon image</label>
                            <input type="file" name="image" id="image" class="dropify"/>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary btn-rounded" data-dismiss="modal">Hủy</a>
                            <button type="submit" class="btn btn-warning btn-rounded">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade small-modal" tabindex="-1" id="del-items" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-body">
                        <p>Do you want to delete <strong></strong> ?</p>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-xs-6">
                        <button type="button" name="accept" class="btn btn-danger btn-block">
                            OK
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary btn-block">
                            Hủy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJS')
    <script type="text/javascript" src="{{ asset('assets/vendor/nestable/jquery.nestable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/customs/menu-builder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/dropify/dist/js/dropify.min.js') }}"></script>
    <script type="text/javascript">
        $('.dropify').dropify();
    </script>
@endsection