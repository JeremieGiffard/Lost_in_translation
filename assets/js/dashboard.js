/* 
* ADMIN DASBOARD
*/  
  
// For dashboard on admin. Slider loading differents backgrounds each time.
document.addEventListener("DOMContentLoaded", function() {
//console.log('DOM loaded');
let slide = new Array("../assets/images/background/dashboard-bird.jpg", "../assets/images/background/dashboard-monk.jpg", "../assets/images/background/dashboard-night.jpg", "../assets/images/background/dashboard-rogue.jpg", "../assets/images/background/dashboard-spirits.jpg", "../assets/images/background/dashboard-elf.jpg");

//Randomize background chosen
let numero = Math.floor(Math.random() * (slide.length - 0)) + 0;
document.querySelector(".slide").src = slide[numero];
  
  

});