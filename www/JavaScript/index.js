const Verre_a_la= document.querySelector('h1.verre_a_la');
console.log(Verre_a_la);
const value_Verre_a_la = Verre_a_la.innerHTML;

const flamme = document.querySelector('h1.flamme');
const value_flamme = flamme.innerHTML;
new Typewriter(Verre_a_la, {
})
.typeString(value_Verre_a_la)
.start();

new Typewriter(flamme,{
})
.typeString(value_flamme)
.pauseFor(100000)
.start();