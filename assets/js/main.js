// js who's on every page


document.addEventListener("DOMContentLoaded", function() {
/*
* FOOTER
*/  

 //Get date of the day and return only the year.
let now = new Date();
let year = now.getFullYear();
//console.log(year);
document.querySelector('footer span').textContent = year;
  
});



/* * * * * * * * * * * * * * *
* Navbar  responsive. 
*
* * * * * * * * * * * * * * */
document.getElementById("myTopnav").addEventListener("click", function() 
{
  //console.log('navbar responsive active')
  let x = document.getElementById("myTopnav");
  if (x.className === "navbar") {
    x.className += " responsive";
  }
  else {
    x.className = "navbar";
  }
  
});




