/**
 * Created by sura on 2015/4/21 0021.
 */
define(function (){
    $(".sort_box ul li").mousemove(function(){
        if(this.className != "on") {
            $(this).addClass("hover");
            $(this).children("a").css("color","#fd4708");
        }
    });
    $(".sort_box ul li").mouseout(function(){
        if(this.className != "on") {
            $(this).removeClass("hover");
            $(this).children("a").css("color", "#6B6F5E");
        }
    });
})