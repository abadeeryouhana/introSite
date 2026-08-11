document.addEventListener('DOMContentLoaded', function () {
    var groupSwiper = new Swiper('.group-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: false,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.group-pagination',
            clickable: true,
            bulletClass: 'custom-bullet',
            bulletActiveClass: 'custom-bullet-active',
        },
        navigation: {
            nextEl: '.group-button-next',
            prevEl: '.group-button-prev',
        },
        breakpoints: {
            768: { slidesPerView: 2, spaceBetween: 30 },
            1024: { slidesPerView: 3, spaceBetween: 40 }
        }
    });

    var testimonialsSwiper = new Swiper('.testimonials-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.testimonials-pagination',
            clickable: true,
            bulletClass: 'custom-bullet',
            bulletActiveClass: 'custom-bullet-active',
        },
        breakpoints: {
            768: { slidesPerView: 2, spaceBetween: 30 },
        }
    });
});
