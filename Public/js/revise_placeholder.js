$(function() {
    var old_pas = $("#old_pas");
    var old_pas_wrong = $("#old_password_wrong");
    var old_pas_ok = $("#old_password_ok");
    var old_pas_test = true;

    var pas = $("#new_pas");
    var pas_wrong = $('#new_password_wrong');
    var pas_strong = $('#newPwdStrongTip');
    var normal = /^(?![a-zA-z]+$)(?!\d+$)(?![!@#$%^&*]+$)[a-zA-Z\d!@#$%^&*]+$/;
    var strong = /^(?![a-zA-z]+$)(?!\d+$)(?![!@#$%^&*]+$)(?![a-zA-z\d]+$)(?![a-zA-z!@#$%^&*]+$)(?![\d!@#$%^&*]+$)[a-zA-Z\d!@#$%^&*]+$/;
    var pas_test = true;

    var repas = $("#re_new_pas");
    var repas_ok = $("#new_repassword_ok");
    var repas_wrong = $("#new_repassword_wrong");
    var repas_test = true;

    var revise_submit = $("#revise_submit");

    old_pas.focus(function() {
        old_pas_ok.hide();
        old_pas_wrong.removeClass('cue').addClass('warm').html('6-20个字符,可由英文、数字及符号组成').show();
    }).blur(function() {
        if(this.value) {
            if(this.value.length < 6 || this.value.length > 20) {
                old_pas_ok.hide();
                old_pas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>密码长度6-20个字符,请重新输入').show();
                old_pas_test = true;
            }
            else {
                old_pas_wrong.hide();
                old_pas_ok.show();
                old_pas_test = false;
            }
        }
        else {
            old_pas_wrong.hide();
            old_pas_test = true;
        }
    })

    pas.focus(function () {
            pas_wrong.hide();
            pas_wrong.removeClass('cue').addClass('warm').html('6-20个字符,可由英文、数字及符号组成').show();
        }
    ).blur(function () {
            if(this.value) {
                if(this.value.length < 6 || this.value.length > 20) {
                    pas_strong.hide();
                    pas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>密码长度6-20个字符,请重新输入').show();
                    pas_test = true;
                }
                else if(this.value.indexOf(' ') > -1) {
                    pas_strong.hide();
                    pas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>密码不能包含“空格”,请重新输入').show();
                    pas_test = true;
                }
                else if(pas.val() && repas.val() != pas.val() && repas.val()) {
                    repas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>两次密码不相同，请重新输入').show();
                    repas_ok.hide();
                    repas_test = true;
                }
                else if( pas.val() && repas.val() == pas.val() && repas.val()) {
                    repas_wrong.hide();
                    repas_ok.show();
                    repas_test = false;
                }
                else {
                    pas_wrong.hide();
                    pas_strong.show();
                    pas_test = false;
                }
            }
            else {
                pas_wrong.hide();
                pas_test = true;
            }
        }
    ).keyup(function(event){
            //9是tag的keycode
            if(event.which != 9) {
                pas_wrong.hide();
                pas_strong.show();
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

    repas.focus(function () {
            repas_ok.hide();
            repas_wrong.removeClass('cue').addClass('warm').html('请再次输入密码').show();
        }
    ).blur(function () {
            if(pas.val() && repas.val() != pas.val() || repas.val() && !pas.val()) {
                repas_ok.hide();
                repas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>两次密码不相同，请重新输入').show();
                repas_test = true;
            }
            else if ( (repas.val() == pas.val()) && pas.val() && ( pas.val().indexOf(' ') == -1)){
                repas_wrong.hide();
                repas_ok.show();
                repas_test = false;
            }
            else{
                repas_wrong.hide();
                repas_test = true;
            }
        });

    revise_submit.click(function(){
        if( ! old_pas.val() ) {
            old_pas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>原密码不能为空').show();
            return false;
        }
        if( ! pas.val() ) {
            pas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>新密码不能为空').show();
            return false;
        }
        if( ! repas.val() ) {
            repas_wrong.removeClass('warm').addClass('cue').html('<span class="icon"></span>重复新密码不能为空').show();
            return false;
        }
        if(pas_test || repas_test || pas_test ) {
            return false;
        }
        $("#register").submit();
    })
})