var main = function () {

    /* Push the body and the nav over by 285px over */
    $('.icon-menu').click(function () {

        $('.icon-menu-open').toggleClass('hide');
        $('.icon-menu').toggleClass('hide');

        // $('.menu').animate({
        //     left: "0px"
        // }, 200);

        $('body').animate({
            left: "100px"
        }, 200);

    });

    $('.icon-menu-open').click(function () {

        $('.icon-menu-open').toggleClass('hide');
        $('.icon-menu').toggleClass('hide');

        // $('.menu').animate({
        //     left: "-235px"
        // }, 200);

        $('body').animate({
            left: "50px"
        }, 200);

    });

};

//This waits for the HTML document to load completely before running the main() function.
//This is important because JavaScript should only run after the web page has loaded completely in the browser - otherwise there wouldn't be any HTML elements to add interactivity to.
$(document).ready(main);