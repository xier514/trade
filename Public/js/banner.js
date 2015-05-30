define(function () {
    var container = document.getElementById('container');
    var list = document.getElementById('list');
    var buttons = document.getElementById('buttons').getElementsByTagName('li');
    var index = 1;
    var timer;

    function showButton() {
        for (var i = 0; i < buttons.length; i++) {
            if(buttons[i].className == 'on'){
                buttons[i].className = '';
                break;
            }
        };
        buttons[index - 1].className = 'on';
    }

    function play() {
        timer = setInterval( function(){
            if(index == 5) {
                index = 1;
            }
            else {
                index = parseInt(index)+1;
            }
            list.style.left = [(parseInt(index) - 1) * -750 ] + 'px';
            showButton();
        },3000);
    }

    function stop() {
        clearInterval(timer);
    }

    for(var i = 0; i < buttons.length; i++) {
        buttons[i].onmouseover = function() {
            var newIndex = this.getAttribute('index');
            list.style.left = (newIndex-1) * -750 + 'px';
            index = newIndex;
            showButton();
        }
    }

    play();
    container.onmouseover = stop;
    container.onmouseout = play;
})