$(document).ready(function() {
    // Call the openNav() function when the document is ready
    openNav();
});
function openNav() {
  document.getElementById("mySidebar").style.width = "230px";
  document.getElementById("main").style.marginLeft = "230px";
 
  
  document.getElementById("mySidebar").style.top = "30px"; // Set top position to 30px
  document.getElementById("main").style.top = "30px";
  $('#open1').hide();
}


function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
 
  $('#open1').show();
  $('#open1').css('top', '50px');
}