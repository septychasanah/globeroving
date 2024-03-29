// navbar-scroll
jQuery(document).ready(function ($) {
    $(window).bind("resize", function () {
        //console.log($(this).width())
        if ($(this).width() > 992) {
            $(window).scroll(function () {
                if ($(window).scrollTop() > 50) {
                    $('header').addClass('fixed-top', 5000, "linear");
                    $('.navbar').css('background', 'transparent');
                    $('.navbar').css('border', '0');
                } else {
                    $('header').removeClass('fixed-top', 5000, "linear");
                    $('.navbar').css('background', 'white');
                    $('.navbar').css('border-bottom', '1px solid #e5e5e5');
                }


                if ($(window).scrollTop() >= 200) {
                    $('.navbar').addClass('navbar-scrolled', 5000, "linear");
                } else {
                    $('.navbar').removeClass('navbar-scrolled', 5000, "linear");
                }
            });

            $(window).scroll(function () {
                $(".navbar .navbar-brand .sitename a").css("opacity", 1 - $(window).scrollTop() / 250);
            });
        }

        if ($(this).width() < 992) {
            $(window).scroll(function () {
                if ($(window).scrollTop() > 100) {
                    $('header').addClass('fixed-top', 5000, "linear");
                } else {
                    $('header').removeClass('fixed-top', 5000, "linear");
                }
            });
        }


    }).trigger('resize');
});
// Contact Form Class
jQuery(document).ready(function ($) {
    $('.wpcf7 form .wpcf7-form-control').addClass('form-control');
    $('.wpcf7 form .wpcf7-form-control.wpcf7-submit').addClass('btn btn-primary').removeClass('form-control');
    $('.wpcf7 form .wpcf7-form-control[name="your-name"]').attr('placeholder', 'Name');
    $('.wpcf7 form .wpcf7-form-control[name="your-email"]').attr('placeholder', 'Email');
    $('.wpcf7 form .wpcf7-form-control[name="your-subject"]').attr('placeholder', 'Subject');
    $('.wpcf7 form .wpcf7-form-control[name="your-message"]').attr('placeholder', 'Your Message');
});