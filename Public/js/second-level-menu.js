$(function() {
    //载入一级菜单选项
//    $("#classify").load('js/php/fetchBootStyleOptions.php');

//    $("#classify").change(function(event){
//        $("#subclass").load(
//            'js/php/fetchColorOptions.php',
//            $(this).serialize(),
//            function(){
//                $(this).attr('disabled',false);
//            }
//        )
//    });

    //事件冒泡，删除空白值的选项
    $('#selectionsPane').change(function(event){
        $('[value=""]',event.target).remove();
    });
})