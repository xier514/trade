
$(function(){
  var pla =  "";
  var acc = $('#username');
  var pas = $('#password');
  var cap = $('#captcha');
  var user = "用户名";
  var password = "密码";
  var captcha = "验证码";


  acc.focus(function(){
    $('.account').addClass('focus');
    $('#accountmessage').css('display', 'block');     
    pla = $(this).attr('placeholder');
    if(acc.value != "") $(this).attr('placeholder',"");   
  }
  ).blur(function(){
        $('.account').removeClass('focus');
        $('#accountmessage').css('display', 'none'); 
        if($(this).val() == ""){
          $(this).attr('placeholder',user);
        }
      });
  
  //密码
  pas.focus(function(){    
    $('.password').addClass('focus'); 
    $('#passwordmessage').css('display', 'block');     
    pla = $(this).attr('placeholder');
    if(pas.value != "") $(this).attr('placeholder',"");   
  }
  ).blur(function(){
        $('.password').removeClass('focus');
        $('#passwordmessage').css('display', 'none');  
        if($(this).val() == ""){
         $(this).attr('placeholder',password);
        }
      });

  //验证码
  cap.focus(function(){    
    $('.captcha').addClass('focus'); 
    $('#captchamessage').css('display', 'block');     
    pla = $(this).attr('placeholder');
    if(cap.value != "") $(this).attr('placeholder',"");   
  }
  ).blur(function(){
        $('.captcha').removeClass('focus');
        $('#captchamessage').css('display', 'none');  
        if($(this).val() == ""){
         $(this).attr('placeholder',captcha);
        }
    });
})