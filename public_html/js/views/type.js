$(document).ready(function () {

    var soundType = new Audio('sounds/typing/type.wav');
    $('.type').bind('input', function () {
        soundType.pause();
        soundType.currentTime = 0;
        soundType.play();
    });

    $('.type')
        .focus(function () {
            $(this).select();
        })
        .mouseup(function (e) {
            e.preventDefault();
        });
});