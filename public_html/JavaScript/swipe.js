const swiper = new Swiper('.swiper', {
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

pagination: {
    el: '.swiper-pagination',
    clikable: true,
},

navigation: {
    nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
},
});