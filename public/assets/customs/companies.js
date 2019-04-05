$(document).ready(function(){
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
});