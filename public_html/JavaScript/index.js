const Verre_a_la= document.querySelector('h1.verre_a_la');
const value_Verre_a_la = Verre_a_la.innerHTML;

const flamme = document.querySelector('h1.flamme');
const value_flamme = flamme.innerHTML;

new Typewriter(Verre_a_la, {
    cursor: ''
})
.typeString(value_Verre_a_la)
.start();

new Typewriter(flamme,{
    cursor: ''
})
.typeString(value_flamme)
.start();

const swiper = new Swiper('.swiper', {
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: true,
    },

navigation: {
    nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
},
});