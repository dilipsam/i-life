$(function () {


    $('#slides').superslides({
        animation: 'fade',
        slide_speed: 800,
        animation_speed: 'slow',
        animation_easing: 'linear',
        pagination: true,
        play: 7200
    });


});


$(window).load(function () {
    window.setTimeout(function () {
        $(".slides-container img").fadeIn();
    }, 300);
});