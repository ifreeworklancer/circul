(function () {
    'use strict';

    const desktop = window.matchMedia('(min-width: 1260px)');
    // if (desktop.matches) {
    //     $('.banner > .container').parally({
    //         speed: -0.6,
    //         offset: -70
    //     });
    // }

    $(document).ready(function () {
        $('.promo__list').slick({
            arrows: false,
            dots: true,
            fade: true,
            autoplay: true,
            autoplaySpeed: 2000
        });
    });

    $('.card__list').slick({
        arrows: true,
        dots: true,
        vertical: true,
        verticalSwiping: true,
        infinite: false,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    arrows: false,
                    vertical: false,
                    verticalSwiping: false
                }
            }
        ]
    });

    $('.card__list').on('wheel', (function(e) {
        e.preventDefault();
        let scrollCount = 0;
        scroll = setTimeout(function () { scrollCount = 0; }, 200);
        if (scrollCount) return 0;
        scrollCount = 1;
        if (e.originalEvent.deltaY < 0) {
            $(this).slick('slickPrev');
        } else {
            $(this).slick('slickNext');
        }
    }));

// var startSlide = $('.card__list').slick('slickCurrentSlide');
// let totalCount = $('li.card__item:not(.slick-cloned)').length - 1;
//
// if (startSlide === 0) {
//   $('.card__list .slick-prev').addClass('arrow-block');
// }
//
// $('.card__list').on('afterChange', function(event, slick, currentSlide, nextSlide){
//   if (currentSlide === 0) {
//     $('.card__list .slick-prev').addClass('arrow-block');
//   } else {
//     $('.card__list .slick-prev').removeClass('arrow-block');
//   }
//
//   if (currentSlide === totalCount) {
//     $('.card__list .slick-next').addClass('arrow-block');
//   } else {
//     $('.card__list .slick-next').removeClass('arrow-block');
//   }
// });


    let tablet = window.matchMedia('(max-width: 767px)');

    if (tablet.matches) {
        $('.advice__list').slick({
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
})();
