
$(document).ready(function () {
    $("a#inline1,a#inline2,a#inline3").fancybox({
        'hideOnContentClick': true
    });
    $("a#voice1,a#voice2,a#voice3").fancybox({
        'hideOnContentClick': true
    });
    
    $('#showLeft').click(function () {
        if ($('#navbar').hasClass('cbp-spmenu-open')) {
            $('#navbar').removeClass('cbp-spmenu-open');
        } else {
            $('#navbar').addClass('cbp-spmenu-open');
        }
    });

    $("#class1").click(function () {
        $("#class").val(1);
        $("#class1").addClass('add-info-active');
        $("#class2").removeClass("add-info-active");
        $("#class3").removeClass("add-info-active");
    });
    $("#class2").click(function () {
        $("#class").val(2);
        $("#class2").addClass("add-info-active");
        $("#class1").removeClass("add-info-active");
        $("#class3").removeClass("add-info-active");
    });
    $("#class3").click(function () {
        $("#class").val(3);
        $("#class3").addClass("add-info-active");
        $("#class2").removeClass("add-info-active");
        $("#class1").removeClass("add-info-active");
    });

    $("#room1").click(function () {
        $("#room").val(1);
        $("#room1").addClass('add-info-active');
        $("#room2").removeClass("add-info-active");
        $("#room3").removeClass("add-info-active");
    });
    $("#room2").click(function () {
        $("#room").val(2);
        $("#room2").addClass("add-info-active");
        $("#room3").removeClass("add-info-active");
        $("#room1").removeClass("add-info-active");
    });
    $("#room3").click(function () {
        $("#room").val(3);
        $("#room3").addClass("add-info-active");
        $("#room1").removeClass("add-info-active");
        $("#room2").removeClass("add-info-active");
    });
    /*
     var top = 930;
     $(window).scroll(function (event) {
     var y = $(this).scrollTop();
     if (y >= top) {
     $('#nav-fmenu').removeClass('hide');
     $('#nav-fmenu').attr('style', '');
     
     $('#mb-gototop').removeClass('hide');
     } else {
     $('#nav-fmenu').addClass('nav-fmenu hide');
     
     $('#mb-gototop').addClass('show-mb hide');
     $('#mb-gototop').addClass('show-mb');
     }
     //$('#navbar').removeClass('cbp-spmenu-open');
     });
     $('#nav-fmenu').addClass('nav-fmenu hide');
     */

    // Add scrollspy to <body>
    $('body').scrollspy({target: ".navbar", offset: 50});

    // Add smooth scrolling to all links inside a navbar
    $("#myNavbar a").on('click', function (event) {

        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash (#)
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area (the speed of the animation)
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 800, function () {

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
    });



    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
            //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
            offset_opacity = 1200,
            //duration of the top scrolling animation (in ms)
            scroll_top_duration = 700,
            //grab the "back to top" link
            $back_to_top = $('.scroll-top-wrapper');

    //hide or show the "back to top" link
    $(window).scroll(function () {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
        x = $(this).scrollTop() > offset;
        $('#navbar').removeClass('cbp-spmenu-open');
    });

    //smooth scroll to top
    $back_to_top.on('click', function (event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0,
        }, scroll_top_duration
                );
    });


    /*
     $(function () {
     
     $(document).on('scroll', function () {
     $('#navbar').removeClass('cbp-spmenu-open');
     if ($(window).scrollTop() > 100) {
     $('.scroll-top-wrapper').addClass('show');
     } else {
     $('.scroll-top-wrapper').removeClass('show');
     }
     });
     
     $('.scroll-top-wrapper').on('click', scrollToTop);
     });
     
     function scrollToTop() {
     verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
     element = $('body');
     offset = element.offset();
     offsetTop = offset.top;
     $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
     }*/
});