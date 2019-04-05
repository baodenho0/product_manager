<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <form id="form-menu-item"
                  action="{{route('client.submitAdd')}}" method="POST">
                <div class="form-group">
                    {{ csrf_field() }}
                </div>
                <div class="form-group" id="link_url">
                    <label for="url">SĐT</label>
                    <input type="number" class="form-control" name="phone" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="title">Họ tên khách hàng</label>
                    <input type="text" class="form-control" name="name" placeholder="Họ tên khách hàng" >
                </div>
                <div class="form-group">
                    <label for="class-icon">Biển số xe</label>
                    <input type="text" class="form-control" name="band"
                           placeholder="Biển số xe">
                </div>
                <div class="form-group">
                    <label for="link-type">Phân khối</label>
                    <input type="number" class="form-control" name="cubic" placeholder="Phân khối">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary btn-rounded" data-dismiss="modal">Hủy</a>
                    <button type="submit" class="btn btn-success btn-rounded">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>