$(document).ready(function() {
    // Call the openNav() function when the document is ready
    // closeNav();
     $('#get_category').css('display', 'none'); // remove the selector from the HTML skeleton
     $('#get_brand').css('display', 'none'); 
    // Check if the screen size changes and close the sidebar if the screen width is less than 768px
    var mq = window.matchMedia("(max-width: 768px)");
    mq.addEventListener("change", function() {
        if (mq.matches) {
            closeNav();
        }
    });
});

function openNav() {
  document.getElementById("mySidebar").style.width = "auto";
  document.getElementById("main").style.marginLeft = "auto";
  document.getElementById("mySidebar").style.top = "30"; // Set top position to 0
  document.getElementById("main").style.top = "30";
  $('.closebtn').css('visibility', 'visible'); // Show the close button
  $('#open1').hide();
  $('#get_category').css('display', 'block'); // bring the selector back to the HTML skeleton
$('#get_brand').css('display', 'block'); // bring the selector back to the HTML skeleton

}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  $('.closebtn').css('visibility', 'hidden'); // hide the close button 
  $('#get_category').css('display', 'none'); // remove the selector from the HTML skeleton
$('#get_brand').css('display', 'none'); // remove the selector from the HTML skeleton

  $('#open1').show();
  $('#open1').css('top', '30px');
}


function toggleNav() {
  var sidebar = document.getElementById("mySidebar");
  if (sidebar.style.width === "0px" || sidebar.style.width === "") {
      openNav();
  } else {
      closeNav();
  }
}
