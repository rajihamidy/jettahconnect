function myFunction() {
  alert("Online Payment Selected");
  // You can add more code here to perform any action you want
}
$(document).ready(function () {

  $("body").delegate("#payonline", "click", function () {
    alert("Online Payment Selected again");
  })

  $("body").delegate("#delivarypay", "click", function () {
    var user_id = [];
    var product_id = [];
    var qty = [];
    var trx_id = [];
    var p_status = [];
    var seller_id = [];
    
    // Iterate over each row
    $(".row").each(function () {
        var $row = $(this);
        user_id.push($row.find("[name='user_id[]']").val());
        product_id.push($row.find("[name='product_id[]']").val());
        trx_id.push($row.find("[name='trx_id[]']").val());
        qty.push($row.find("[name='qty[]']").val());
        p_status.push($row.find("[name='p_status[]']").val());
        seller_id.push($row.find("[name='seller_id[]']").val());
    });
    
    // Combine arrays into an array of objects
    var combinedArray = user_id.map(function(_, i) {
        return {
            user_id: user_id[i],
            product_id: product_id[i],
            qty: qty[i],
            trx_id: trx_id[i],
            p_status: p_status[i],
            seller_id: seller_id[i]
        };
    });

    // Filter out blank records
    var filteredArray = combinedArray.filter(function(record) {
        return Object.values(record).every(function(value) {
            return value !== null && value !== undefined && value !== '';
        });
    });
    /* Displaying each record 
    filteredArray.forEach(function(record, index) {
      var element = document.createElement("div");
      element.innerHTML = "<p>Record " + (index + 1) + ":</p>";
      
      Object.keys(record).forEach(function(key) {
          element.innerHTML += "<p>" + key + ": " + record[key] + "</p>";
      });
  
      document.body.appendChild(element);
  }); */
  
    // Now, you can post the filteredArray via Ajax
    $.ajax({
        url: 'action2.php',
        method: 'POST',
        data: JSON.stringify(filteredArray),
        contentType: 'application/json',
        success: function(response) {
            alert(response);
            location.reload();
            window.location='profile.php';
        },
        error: function(xhr, status, error) {
            alert(error);
        }
    });
});



})
