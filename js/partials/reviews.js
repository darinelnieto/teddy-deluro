// JS for partial: reviews
(function($) {
    "use strict";

    $(function() {
        // Declaramos la variable dentro del ready
        var reviews = $('.reviews-slide');

        // Verificamos si el elemento existe y si la función existe
        if (reviews.length && $.isFunction($.fn.owlCarousel)) {
            reviews.owlCarousel({
                autoplay: true,
                loop: true,
                nav: true,
                navText: [
                    `<img src="${_sajoURI_}/images/prev-review.webp" alt="Prev" width="54" height="44" class="prev-button-image">`,
                    `<img src="${_sajoURI_}/images/next-review.webp" alt="Next" width="54" height="44" class="next-button-image">`
                ],
                dots: false,
                items: 1,
            }).css({ 'opacity': 1 });
        } else {
            console.warn("OwlCarousel no está cargado o .reviews-slide no existe.");
        }

        // Lógica para Instagram (sbi_images)
        var checkExist = setInterval(function() {
            var $grid = $('#sbi_images');
            if ($grid.length && $.isFunction($.fn.owlCarousel)) {
                $grid.addClass('owl-carousel');
                $grid.css({ 'display': 'block', 'width': '100%' });
                $grid.find('.sbi_item').css({ 'width': 'auto', 'float': 'none', 'display': 'inline-block' });

                $grid.owlCarousel({
                    loop: true,
                    margin: 33.76,
                    nav: true,
                    navText: [
                        `<img src="${_sajoURI_}/images/prev-post-ig.webp" alt="Prev" width="54" height="44" class="prev-button-image">`,
                        `<img src="${_sajoURI_}/images/next-post-ig.webp" alt="Next" width="54" height="44" class="next-button-image">`
                    ],
                    dots: true,
                    autoplay: false,
                    responsive: {
                        0: { items: 2, margin: 10 },
                        600: { items: 3 },
                    }
                });

                clearInterval(checkExist);
            }
        }, 500);
    });
})(jQuery);