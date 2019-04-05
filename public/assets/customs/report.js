$(document).ready(function () {
    $('#client').select2();
    $('#product').select2();
    const time1 = $('#start_time');
    const time2 = $('#end_time');
    const error1 = $('#error1');
    const error2 = $('#error2');

    $('#datetimepicker1').datetimepicker({
        // dateFormat: 'dd-mm-yy',
        format: 'YYYY-MM-DD'
    });
    $('#datetimepicker2').datetimepicker({
        // dateFormat: 'dd-mm-yy',
        format: 'YYYY-MM-DD',
    });
    function checkDate() {
        var a = [];
        if (time1.val() == '') {
            a.push('req1');
        }
        if (time2.val() == '') {
            a.push('req2');
        }
        if (time1.val() > time2.val()) {
            a.push('t1_t2');
        }
        return a;
    }
    $('#form-report').submit(function () {
        if(checkDate().length > 0) {
            var a = checkDate();
            for (var i = 0; i < a.length; i++) {
                if (a[i] == 'req1') {
                    $('#start').css({'color': 'red'});
                    error1.html('Không được để trống ').css({'color': 'red'});
                } else if (a[i] == 'req2') {
                    $('#end').css({'color': 'red'});
                    error2.html('Không được để trống ').css({'color': 'red'});
                } else if (a[i] == 't1_t2') {
                    if (time1.val() != '') {
                        $('#start').removeAttr("style");
                        error1.html('');
                    }
                    if (time2.val() != '') {
                        $('#end').removeAttr("style");
                        error2.html('');
                    }
                    error2.html('Vui lòng nhập lại ').css({'color': 'red'});
                }
            }
            return false;
        }
    });
});