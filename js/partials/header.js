// JS for partial: header\n
(function($) {
    $(function() {
        let lastScrollTop = 0;
        const $header = $('header .header-partial-b3c1ef'); // Asegúrate de que el selector sea el correcto
        const scrollThreshold = 50; // Pixels mínimos para activar el efecto

        $(window).on('scroll', function() {
            let currentScroll = $(this).scrollTop();

            // Evitamos que se active con scrolls muy pequeños (opcional)
            if (Math.abs(lastScrollTop - currentScroll) <= scrollThreshold) return;

            if (currentScroll > lastScrollTop && currentScroll > 100) {
                $header.removeClass('fixed');
            } else {
                $header.addClass('fixed');
            }
            lastScrollTop = currentScroll;
        });

        var menu_status = false;
        $('.bar-menu').on('click', function(){
            if(menu_status === false){
                menu_status = true;
                $('.nav-menu').addClass('active');
            }else{
                menu_status = false;
                $('.nav-menu').removeClass('active');
            }
        });
    });
})(jQuery);