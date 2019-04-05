$(document).ready(function () {
    const mLinkType = $('select[name="link-type"]'),
        mForm = $('#form-menu-item'),
        mModal = $('#add-items'),
        mTitle = $('input[name="title"]'),
        mClassIcon = $('input[name="class-icon"]'),
        mUrl = $('input[name="url"]'),
        mRoute = $('input[name="route"]'),
        mParameters = $('textarea[name="parameters"]'),
        mToken = $('input[name="_token"]'),
        mTarget = $('select[name="target"]');
    mLinkType.on('change',function (){
        if($(this).val() === 'url'){
            mRoute.val('');
            mParameters.val('');
            $('#link_route').hide();
            $('#link_url').slideDown();
        }else{
            mUrl.val('');
            $('#link_route').slideDown();
            $('#link_url').hide();
        }
    });
    // mModal.on('show.bs.modal',function(e){
    //     let btn = $(e.relatedTarget);
    //     $('#link_route').hide();
    //     $('#link_url').slideDown();
    //
    //     if(btn.data('type') === 'add'){
    //         mForm[0].reset();
    //         var btnSave = $('<button>', { class:'btn btn-success btn-rounded', name: "save", text: 'Thêm' });
    //         $(this).find('.modal-title').text('Thêm menu item mới');
    //         $(this).find('.modal-footer button[name="save"]').remove();
    //         $(this).find('.modal-footer button[name="update"]').remove();
    //         $(this).find('.modal-footer').append(btnSave);
    //         btnSave.click(function(){
    //             var href = mForm.data('action-add');
    //             var data = {
    //                 title: mTitle.val(),
    //                 link_type: mLinkType.val(),
    //                 url : mUrl.val(),
    //                 target: mTarget.val(),
    //                 icon_class: mClassIcon.val(),
    //                 route: mRoute.val(),
    //                 parameters: mParameters.val(),
    //                 _token: mToken.val(),
    //                 _method: "POST"
    //             };
    //             $.post(href,data).done(function(rs){
    //                 if(rs.status === 'success'){
    //                     mModal.modal('hide');
    //                     toastr.success(rs.message,'Success !!');
    //                     setTimeout(function(){ location.reload() },1000)
    //                 }
    //                 else toastr.error(rs.message,'Error !!');
    //             });
    //
    //         });
    //
    //     }else{
    //         mForm[0].reset();
    //         let btnUpdate = $('<button>', { class:'btn btn-warning btn-rounded', name: "update", text: 'Cập nhật' });
    //         $(this).find('.modal-title').text('Cập nhật menu item');
    //         $(this).find('.modal-footer button[name="save"]').remove();
    //         $(this).find('.modal-footer button[name="update"]').remove();
    //         $(this).find('.modal-footer').append(btnUpdate);
    //         let showHref = btn.data('href').replace('update','show');
    //         $.get(showHref,{}).done(function(rs){
    //             if(rs.route){
    //                 $('#link_route').show();
    //                 $('#link_url').hide();
    //                 mLinkType.find('option[value="route"]').attr('selected',true);
    //                 mLinkType.find('option[value="url"]').attr('selected',false);
    //             }else{
    //                 $('#link_route').hide();
    //                 $('#link_url').show();
    //                 mLinkType.find('option[value="route"]').attr('selected',false);
    //                 mLinkType.find('option[value="url"]').attr('selected',true);
    //             }
    //             if(rs.target === '_blank'){
    //                 mTarget.find('option[value="_blank"]').attr('selected',true);
    //                 mTarget.find('option[value=""]').attr('selected',false);
    //             }else{
    //                 mTarget.find('option[value=""]').attr('selected',true);
    //                 mTarget.find('option[value="_blank"]').attr('selected',false);
    //             }
    //             mTitle.val(rs.title);
    //             mClassIcon.val(rs.icon_class);
    //             mUrl.val(rs.url);
    //             mRoute.val(rs.route);
    //             mParameters.val(rs.parameters);
    //         });
    //         btnUpdate.click(function(){
    //             var data = {
    //                 title: mTitle.val(),
    //                 link_type: mLinkType.val(),
    //                 url : mUrl.val(),
    //                 target: mTarget.val(),
    //                 icon_class: mClassIcon.val(),
    //                 route: mRoute.val(),
    //                 parameters: mParameters.val(),
    //                 _token: mToken.val(),
    //                 _method: "POST"
    //             };
    //             $.post(btn.data('href'),data).done(function(rs){
    //                 if(rs.status === 'success'){
    //                     mModal.modal('hide');
    //                     toastr.success(rs.message,'Thông báo !!');
    //                     setTimeout(function(){ location.reload() },1000)
    //                 }
    //                 else toastr.error(rs.message,'Thông báo !!');
    //             });
    //         });
    //     }
    // });
    let uMenuItems = function(event){
        let list = event.length ? event : $(event.target);
        let data = list.nestable('serialize');
        $.ajax({
            url: $('#menuItems').data('href'),
            method: 'PUT',
            data: {_token: mToken.val(), data : data},
            success: function(){
                toastr.success("Sắp xếp menu item thành công.");
            }
        });
    };
    $('#menuItems').nestable({ group:1, maxDepth:7 }).on('change',uMenuItems)
    $('#del-items').on('show.bs.modal', function(e){
        var btn = $(e.relatedTarget);
        $(this).find('p.text-muted').text(`Bạn có muốn xóa ${btn.data('title')} ?`);
        var href = btn.data('href');
        $(this).find('button[name="accept"]').click(function(){
            $.post(href,{_token: mToken.val(),_method:'DELETE'}).done(function(rs){
                if(rs.status === 'success'){
                    $('#del-items').modal('hide');
                    toastr.success(rs.message,'Thông báo !!');
                    btn.parent().parent().parent().remove()
                }
                else toastr.error(rs.message,'Thông báo !!');
            });
        });
    });
    $('#delete').on('show.bs.modal',function(e){
        var btn = $(e.relatedTarget);
        var name = btn.data('name');
        $(this).find("strong").text(name);
        var href = btn.data('href');
        $('#btnOk').off().click(function () {
            var token = $(this).data('token');
            $.post(href, {_token: token, _method: 'DELETE'}).done(function(rs){
                if(rs.type ==='success'){
                    toastr.success(rs.message,'Success !!');
                    $('#delete').modal('hide');
                    btn.parent().parent().remove();
                }
            });
        });
    });
    const link_route = $('#linkroute');
    const link_url = $('#linkurl');
    link_route.hide();
    $('#select').on('change', function () {
        let value = $(this).val();
        if (value == 'route') {
            link_route.slideToggle();
            link_url.hide();
        } else {
            link_route.hide();
            link_url.slideToggle();
        }

    });
});