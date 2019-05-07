(function () {
    'use strict';

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
