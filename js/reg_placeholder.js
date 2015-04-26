/**
 * Created by sura on 2015/4/23 0023.
 */

$(function() {
    var use = $('#reg_account');
    var use_wrong = $('#spn_username_wrong');
    var pas = $('#reg_password');
    var pas_wrong = $('#spn_password_wrong');
    var pas_strong = $('#spnPwdStrongTip');
    var repas = $('#reg_re_password');
    var repas_wrong = $('#spn_repassword_wrong');
    var vco = $('#reg_vcode');
    var vco_wrong = $('#spn_vcode_wrong');
    var normal = /^(?![a-zA-z]+$)(?!\d+$)(?![!@#$%^&*]+$)[a-zA-Z\d!@#$%^&*]+$/;
    var strong = /^(?![a-zA-z]+$)(?!\d+$)(?![!@#$%^&*]+$)(?![a-zA-z\d]+$)(?![a-zA-z!@#$%^&*]+$)(?![\d!@#$%^&*]+$)[a-zA-Z\d!@#$%^&*]+$/;
    var account = /^[a-zA-Z]\w{5,19}$/;

    //账号
    use.focus(function () {
            use_wrong.removeClass('cue').addClass('warm').html('6-20个字符,可由英文、数字及下划线组成，必须以英文开头').show();
        }
    ).blur(function () {
            if(this.value) {
                if(!account.test(use.val())) {
                    use_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>格式不正确，请重新输入').show();
                }
            }
            else {
                use_wrong.hide();
            }
    });

    //密码
    pas.focus(function () {
            $('#spnPwdStrongTip').hide();
            pas_wrong.removeClass('cue').addClass('warm').html('6-20个字符,可由英文、数字及符号组成').show();
        }
    ).blur(function () {
            if(this.value) {
                if(this.value.length < 6 || this.value.length > 20) {
                    pas_strong.hide();
                    pas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>密码长度6-20个字符,请重新输入').show();
                }
                else if(this.value.indexOf(' ') > -1) {
                    pas_strong.hide();
                    pas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>密码不能包含“空格”,请重新输入').show();
                }
                else {
                    pas_wrong.hide();
                    pas_strong.show();
                }
            }
            else {
                $('#spn_password_wrong').hide();
            }
        }
    ).keyup(function(event){
            //9是tag的keycode
            if(event.which != 9) {
                pas_wrong.hide();
                $('#spnPwdStrongTip').show();
                if(pas.val().length > 5) {
                    if(strong.test(pas.val())){
                        pas_strong.removeClass('pswState-poor');
                        pas_strong.addClass('pswState-strong');
                    }
                    else if(normal.test(pas.val())) {
                        pas_strong.removeClass('pswState-poor');
                        pas_strong.addClass('pswState-normal');
                    }
                }
            }
        });

    //重复密码
    repas.focus(function () {
            $('#spn_repassword_ok').hide();
            repas_wrong.removeClass('cue').addClass('warm').html('请再次输入密码').show();
        }
    ).blur(function () {
            if(pas.val() && repas.val() != pas.val() || repas.val() && !pas.val()) {
                repas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>两次密码不相同，请重新输入').show();
            }
            else if (repas.val() == pas.val() && pas.val() && pas.value.indexOf(' ') == -1){
                repas_wrong.hide();
                $('#spn_repassword_ok').show();
            }
           else{
                repas_wrong.hide();
            }
        });

    //验证密码
    vco.focus(function () {
            vco_wrong.removeClass('cue').addClass('warm').html('请输入图片中的字符，不区分大小写').show();
        }
    ).blur(function () {
            $('#spn_vcode_wrong').hide();
        });

    //提交
    $('#reg_btn').click(function (){
        if( ! use.val() ) {
            use_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>账号不能为空').show();
        }
        if( ! pas.val() ) {
            pas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>密码不能为空').show();
        }
        if( ! repas.val() ) {
            repas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>确认密码不能为空').show();
        }
        if( ! vco.val() ) {
            vco_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>验证码不能为空').show();
        }
    })
})