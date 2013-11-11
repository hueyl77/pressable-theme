jQuery(document).ready(function($){
    $(document).on('click touch', '.gb-mobile-navigation', function(e){
        e.preventDefault();

        if ( $('#site-navigation').hasClass('mobile-nav-open') ) {
            $('#site-navigation').removeClass('mobile-nav-open').appendTo('.header-content-wrap');
        } else {
            $('#site-navigation').appendTo('#header').addClass('mobile-nav-open');
        }
    });
});