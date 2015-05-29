//标签
define(function () {
    for (var i = 0; i < $('.hot_content').length; i++){
        $('.hot_head ul li').eq(i).attr("index", i + 1);
        $('.hot_head ul li').bind('mouseover', function() {
            for(var j = 1; j <= $('.hot_head ul li').length; j++ ) {
                $('.hot_head ul li').removeClass('on');
                $('.hot_content').css('display','none');
            }
            $(this).addClass('on');
            $('.tag' + $(this).attr("index")).css('display', 'block');
        })
    }

//内容
    for(var j =1; j <= $('.hot_head ul li').length; j++){
        $('.tag'+ j).each(function() {
            for(var i = 0; i <= 10; i++) {
                $('.tag' + j + ' ' + '[type = bar]').eq(i).attr("index", i+1);
            }
        })
    }

    for(i = 0 ; i < $('.hot_list ul li').length; i ++) {
        $("[type = bar]").bind('mouseover', function() {
            $('.item').css('display','none');
            $('.bar').removeClass('hidden');
            $("[type = item]" + ".line" + [$(this).attr('index')]).css('display','block');
            $("[type = bar]" + ".line" + [$(this).attr('index')]).addClass('hidden');
        });
    }
})



