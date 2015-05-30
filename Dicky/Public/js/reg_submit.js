/**
 * Created by sura on 2015/5/30 0030.
 */
var acc = document.getElementById("reg_account");
var pas = document.getElementById("reg_password")
var rep = document.getElementById("reg_re_password");
var vco = document.getElementById("reg_vcode");
var sub = document.getElementById("reg_btn");

sub.onclick = function() {
    if( !acc.value || !pas.value || !rep.value || !vco.value) {
       return false;
    }
}

