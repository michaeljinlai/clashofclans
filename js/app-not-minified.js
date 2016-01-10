var main = function () {

    /* Push the body and the nav over by 285px over */
    $('.icon-menu').click(function () {

        $('.icon-menu-open').toggleClass('hide');
        $('.icon-menu').toggleClass('hide');
        $('.ptd-logo').toggleClass('hide');
        $('.sidebar-line').toggleClass('hide');
        $("[data-toggle='tooltip']").tooltip('destroy');
        $('.sidebar').css('overflow', 'auto');

        $('.sidebar').animate({
            width: "160"
        }, 200);

        $('body').animate({
            left: "160"
        }, 200);

        setTimeout(function () {
            $('body').css('width', '100%').css('width', '-=160');
            $('.sidebar-log-in').css('width', '160px');
        }, 200);

        document.cookie = "sidebar=open";

    });

    $('.icon-menu-open').click(function () {

        $('.icon-menu-open').toggleClass('hide');
        $('.icon-menu').toggleClass('hide');
        $('.ptd-logo').toggleClass('hide');
        $('.sidebar-line').toggleClass('hide');
        $("[data-toggle='tooltip']").tooltip({container: 'body'});
        $('.sidebar').css('overflow', 'hidden');
        $('.sidebar-log-in').css('width', '50px');

        $('.sidebar').animate({
            width: "50px"
        }, 200);

        $('body').animate({
            left: "50px"
        }, 200);

        setTimeout(function () {
            $('body').css('width', '100%').css('width', '-=50px');
        }, 200);

        document.cookie = "sidebar=close";

    });



};

//This waits for the HTML document to load completely before running the main() function.
//This is important because JavaScript should only run after the web page has loaded completely in the browser - otherwise there wouldn't be any HTML elements to add interactivity to.
$(document).ready(main);Previous12Next