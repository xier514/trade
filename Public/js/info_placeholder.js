$(function(){
    var per_name = $("#per_name");
    var per_name_wrong = $("#per_name_wrong");
    var per_name_ok = $("#per_name_ok");
    var per_name_reg = /^[a-zA-Z0-9\u4e00-\u9fa5]+$/;

    var per_area = $("#per_area");
    var per_area_wrong = $("#per_area_wrong");
    
    var per_mobile = $("#per_mobile");
    var per_mobile_wrong = $("#per_mobile_wrong");
    var per_mobile_ok = $("#per_mobile_ok");
    var per_mobile_reg = /^1\d{10}$/;

    var per_QQ = $("#per_QQ");
    var per_QQ_wrong = $("#per_QQ_wrong");
    var per_QQ_ok = $("#per_QQ_ok");
    var per_QQ_reg = /^\d{5,10}$/;

    var per_email = $("#per_email");
    var per_email_wrong = $("#per_email_wrong");
    var per_email_ok = $("#per_email_ok");
    var per_email_reg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

    var per_weixin = $("#per_weixin");
    var per_weixin_wrong = $("#per_weixin_wrong");
    var per_weixin_ok = $("#per_weixin_ok");

    String.prototype.len=function(){
        return this.replace(/[^\x00-\xff]/g,"aa").length;
    }

    per_name.focus(function(){
        per_name_wrong.removeClass('cue').addClass('warm').html('由英文字母、中文、数字组成，长度4－20个字符，一个汉字为两个字符').css("display", "inline-block")
    }).blur(function(){
        var per_name_len = document.getElementById("per_name").value.len();
        if(this.value) {
            if( !per_name_reg.test(per_name.val())|| per_name.val().indexOf(' ') > -1   ||  per_name_len < 4 || per_name_len> 20) {
                per_name_ok.hide();
                per_name_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>格式不正确，请重新输入').show();
            }
            else {
                per_name_ok.show();
                per_name_wrong.hide();
            }
        }
        else {
            per_name_ok.hide();
            per_name_wrong.hide();
        }
    })
    per_area.change(function(event){
        $('[value=""]',event.target).remove();
        per_area_wrong.hide();
    });

    per_mobile.focus(function() {
        per_mobile_wrong.removeClass('cue').addClass('warm').html('输入11位的手机号码').css("display", "inline-block")
    }).blur(function(){
        if(this.value) {
            if( !per_mobile_reg.test(per_mobile.val())|| per_mobile.val().indexOf(' ') > -1) {
                per_mobile_ok.hide();
                per_mobile_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>格式不正确，请重新输入').show();
            }
            else {
                per_mobile_ok.show();
                per_mobile_wrong.hide();
            }
        }
        else {
            per_mobile_ok.hide();
            per_mobile_wrong.hide();
        }
    })

    per_QQ.focus(function() {
        per_QQ_wrong.removeClass('cue').addClass('warm').html('输入你的QQ号').css("display", "inline-block")
    }).blur(function(){
        if(this.value) {
            if( !per_QQ_reg.test(per_QQ.val())|| per_QQ.val().indexOf(' ') > -1) {
                per_QQ_ok.hide();
                per_QQ_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>格式不正确，请重新输入').show();
            }
            else {
                per_QQ_ok.show();
                per_QQ_wrong.hide();
            }
        }
        else {
            per_QQ_ok.hide();
            per_QQ_wrong.hide();
        }
    })

    per_email.focus(function() {
        per_email_wrong.removeClass('cue').addClass('warm').html('输入你的邮箱').css("display", "inline-block")
    }).blur(function(){
        if(this.value) {
            if( !per_email_reg.test(per_email.val())|| per_email.val().indexOf(' ') > -1) {
                per_email_ok.hide();
                per_email_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>格式不正确，请重新输入').show();
            }
            else {
                per_email_ok.show();
                per_email_wrong.hide();
            }
        }
        else {
            per_email_ok.hide();
            per_email_wrong.hide();
        }
    })

    per_weixin.focus(function() {
        per_weixin_wrong.removeClass('cue').addClass('warm').html('输入你的微信号').css("display", "inline-block")
    }).blur(function(){
        if(this.value) {
            if( per_weixin.val().indexOf(' ') > -1) {
                per_weixin_ok.hide();
                per_weixin_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>格式不正确，请重新输入').show();
            }
            else {
                per_weixin_ok.show();
                per_weixin_wrong.hide();
            }
        }
        else {
            per_weixin_ok.hide();
            per_weixin_wrong.hide();
        }
    })
})