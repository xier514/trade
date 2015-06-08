function per_submit() {
    var per_name = $("#per_name");
    var per_name_wrong = $("#per_name_wrong");

    var per_mobile = $("#per_mobile");
    var per_mobile_wrong = $("#per_mobile_wrong");

    var per_area = $("#per_area");
    var per_area_wrong = $("#per_area_wrong");

    if(!per_name.val()) {
        per_name_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>用户名不能为空').show();
        return false;
    }
    if(!per_area.val()) {
        per_area_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>校区不能为空').show();
        return false;
    }
    if(!per_mobile.val()) {
        per_mobile_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>手机不能为空').show();
        return false;
    }

    return true
}