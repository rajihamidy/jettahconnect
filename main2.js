function myFunction() {
	alert("Online Payment Selected");
	// You can add more code here to perform any action you want
  }
  $(document).ready(function(){

    $("body").delegate("#payonline","click",function(){
      alert("Online Payment Selected again");
  })
  $("body").delegate("#delivarypay","click",function(){
    alert("Payment at delivary has been selected.");
})
  })
  