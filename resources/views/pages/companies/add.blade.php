<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">Thêm công ty</h4>
        </div>
        <form id="form-companies" action="{{route('companies.submitAdd')}}" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    {{ csrf_field() }}
                </div>
                <div class="form-group">
                    <label for="c-name">Tên công ty</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="c-address">Địa chỉ</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="form-group">
                    <label for="c-phone">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary btn-rounded" data-dismiss="modal">Hủy</a>
                <button type="submit" class="btn btn-success">Thêm</button>
            </div>
        </form>
    </div>
</div>