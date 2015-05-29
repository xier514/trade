define(function () {
    var thisId = 0;
    var min_buttons = $('.min_btn li');
    $('.min_btn li').bind("click",function() {
        thisId = $(this).index();
        min_buttons.removeClass('min_on');
        $(this).addClass('min_on');
        flipSlide(thisId);
    })

    $('.btn_pre').click(function() {
        thisId--;
        if(thisId < 0) thisId = 3;
        min_buttons.removeClass('min_on');
        min_buttons[thisId].className="min_on";
        flipSlide(thisId);
        console.log(thisId);
    })

    $('.btn_next').click(function() {
        thisId++;
        if(thisId > 3) thisId = 0;
        min_buttons.removeClass('min_on');
        min_buttons[thisId].className="min_on";

        flipSlide(thisId);
        console.log(thisId);
    })

    function flipSlide(int){
        $('.over').stop(true,true).animate({'left' : '-'+ (int)*750 +'px'});
    }
})