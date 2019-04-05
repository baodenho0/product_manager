<ol class="dd-list">
    @foreach($menuItems as $item)
        @if(isset($item->childs) && $item->childs->count() > 0)
            <li class="dd-item dd3-item" data-id="{{ isset($item->id)?$item->id:'' }}">
                <div class="dd-handle dd3-handle"></div>
                <div class="dd3-content">
                    {{ isset($item->title)?$item->title:'' }}
                    <div class="dd-button">
                        <a class="btn btn-warning btn-sm" href="{{ route('menu-item.updateItemAction', $item->id) }}">
                            <i class="ti-pencil"></i> Sửa
                        </a>
                        <button class="btn btn-danger btn-sm" data-title="{{ $item->title }}"
                                data-href="{{ route('menu-item.destroy', $item->id) }}" data-toggle="modal"
                                data-target="#del-items"><i class="ti-trash"></i> Xóa
                        </button>
                    </div>
                </div>
                @include('pages.menus.child',['menuItems'=>$item->childs])
            </li>
        @else
            <li class="dd-item dd3-item" data-id="{{ isset($item->id)?$item->id:'' }}">
                <div class="dd-handle dd3-handle"></div>
                <div class="dd3-content">
                    {{ isset($item->title)?$item->title:'' }}
                    <div class="dd-button">
                        <a href="{{ route('menu-item.updateItemAction', $item->id) }}" class="btn btn-warning btn-sm">
                            <i class="ti-pencil"></i>edit
                        </a>
                        <button class="btn btn-danger btn-sm" data-title="{{ $item->title }}"
                                data-href="{{ route('menu-item.destroy', $item->id) }}" data-toggle="modal"
                                data-target="#del-items"><i class="ti-trash"></i> Xóa
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="update-items" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <form id="form-menu-item"
                                      action="{{ route('menu-item.store',['itemId' =>request()->route('menuId')]) }}" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title of the Menu Item</label>
                                        <input type="text" value="@if(old('code')) {{ old('code') }}@else{{ $item->title }}@endif" class="form-control" name="title" placeholder="Title...">
                                    </div>
                                    <div class="form-group">
                                        <label for="class-icon">Font Icon class for the Menu Item</label>
                                        <input value="@if(old('code')) {{ old('code') }}@else{{ $item->icon_class }}@endif" type="text" class="form-control" name="class-icon"
                                               placeholder="Icon Class (optional)">
                                    </div>
                                    <div class="form-group">
                                        <label for="link-type">Link type</label>
                                        <select name="link-type" class="form-control">
                                            <option value="url">Static URL</option>
                                            <option value="route">Dynamic Route</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="link_url">
                                        <label for="url">URL</label>
                                        <input value="@if(old('code')) {{ old('code') }}@else{{ $item->url }}@endif" type="text" class="form-control" name="url" placeholder="URL">
                                    </div>
                                    <div class="form-group" id="link_route" style="display: none;">
                                        <label for="route">Route name</label>
                                        <input type="text" class="form-control" name="route" placeholder="Route">
                                        <br>
                                        <label for="parameters">Route parameters (if any)</label>
                                        <textarea rows=2" class="form-control" name="parameters"
                                                  placeholder="{&quot;key&quot;: &quot;value&quot;}"></textarea>
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
                                        <input type="file" name="image" id="image" class="dropify" @if( old('image_path') ) data-default-file="{{ asset(old('image_path')) }}" @else data-default-file="{{ asset($item->image_path) }}@endif"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning btn-rounded" >Thêm</button>
                                        <a class="btn btn-secondary btn-rounded" data-dismiss="modal">Hủy</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endif
    @endforeach
</ol>