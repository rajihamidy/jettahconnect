function myFunction() {
    alert("Online Payment Selected");
    // You can add more code here to perform any action you want
}

$(document).ready(function () {

    // Handler for #payonline2 click event
    $("body").delegate("#payonline2", "click", function () {
        var delM = $('#delM').val();
        var addressInput = $('#addressInput');
        var address = $('#address').val();
        var total_amount1 = $('#net_totals').val();
        var total_amount = parseFloat(total_amount1) + (2 / 100 * (total_amount1)); // Adding 2% for admin charges
        var buyer_email = $('#buyer_email').val();
        var buyer_name = $('#buyer_name').val();
        var buyer_mobile = $('#buyer_mobile').val();

        if (delM === "") {
            $("#message").html("Select Delivery Method").addClass("text-danger");

            setTimeout(function () {
                $("#message").html(""); // Remove the content
            }, 10000); // 10 seconds in milliseconds
            $('#delM').focus();
            return; // Exit function if delivery method is not selected
        } else if (addressInput.css("display") !== "none") {
            var address = $('#address').val();
            if (address === "") {
                $("#message").html("Enter Delivery Address.").addClass("text-danger");

                setTimeout(function () {
                    $("#message").html(""); // Remove the content
                }, 10000); // 10 seconds in milliseconds
                $('#address').focus();
                return; // Exit function if address is empty
            } else {
                triggerCheckout(total_amount, buyer_name, buyer_email, buyer_mobile);
                 //payWithPaystack(total_amount, buyer_name, buyer_email, buyer_mobile);
            }
        } else {
            triggerCheckout(total_amount, buyer_name, buyer_email, buyer_mobile);
           //payWithPaystack(total_amount, buyer_name, buyer_email, buyer_mobile);
        }
    });

    // END OF ONLINE PAYMENT PROCESSING

    // Handler for #delivarypay click event
    $("body").delegate("#delivarypay", "click", function () {
        var delM = $('#delM').val();
        var address = $('#address').val();
        var addressInput = $('#addressInput');

        if (delM === "") {
            $("#message").html("Select Delivery Method").addClass("text-danger");

            setTimeout(function () {
                $("#message").html(""); // Remove the content
            }, 10000); // 10 seconds in milliseconds
            $('#delM').focus();
            return; // Exit function if delivery method is not selected
        } else if (addressInput.css("display") !== "none") {
            var address = $('#address').val();
            if (address === "") {
                $("#message").html("Enter Delivery Address.").addClass("text-danger");

                setTimeout(function () {
                    $("#message").html(""); // Remove the content
                }, 10000); // 10 seconds in milliseconds
                $('#address').focus();
                return; // Exit function if address is empty
            } else {
                // Call this function whenever you want to process and post the data
                processDataAndPost();
            }
        } else {
            // Call this function whenever you want to process and post the data
            processDataAndPost();
        }
    });

    // Function to process data and post to action2.php
    function processDataAndPost() {
        // Retained pre-commented sections
        /*
        var address = $('#address').val();
        var addressInput = $('#addressInput');
        */
        var prod_owner = [];
        var user_id = [];
        var product_id = [];
        var trx_id = [];
        var qty = [];
        var p_status = [];
        var seller_id = [];
    
        // Iterate over each row to populate arrays
        $(".row").each(function () {
            var $row = $(this);
            prod_owner.push($row.find("[name='prod_owner[]']").val());
            user_id.push($row.find("[name='user_id[]']").val());
            product_id.push($row.find("[name='product_id[]']").val());
            trx_id.push($row.find("[name='trx_id[]']").val());
            qty.push($row.find("[name='qty[]']").val());
            p_status.push($row.find("[name='p_status[]']").val());
            seller_id.push($row.find("[name='seller_id[]']").val());
        });
    
        // Get single values for delM and address
        var delM = $('#delM').val();
        var address = $('#address').val();
    
        // Logging to verify data before mapping
      //  console.log("prod_owner:", prod_owner);
      //  console.log("user_id:", user_id);
      //  console.log("delM:", delM);
      //  console.log("address:", address);
    
        // Combine arrays into an array of objects
        var combinedArray = user_id.map(function (_, i) {
            return {
                prod_owner: prod_owner[i],
                user_id: user_id[i],
                product_id: product_id[i],
                qty: qty[i],
                trx_id: trx_id[i],
                p_status: p_status[i],
                seller_id: seller_id[i],
                delM: delM, // Add single value of delM to each object
                address: address // Add single value of address to each object
            };
        });
    
        // Logging combinedArray to verify
       // console.log("combinedArray:", combinedArray);
    
        // Filter out blank records
        var filteredArray = combinedArray.filter(function (record) {
            return Object.values(record).every(function (value) {
                return value !== null && value !== undefined && value !== '';
            });
        });
    
        // Logging filteredArray to verify
        console.log("filteredArray:", filteredArray);
    
                
        // Now, you can post the filteredArray via Ajax
        $.ajax({
            url: 'action2.php',
            method: 'POST',
            data: JSON.stringify(filteredArray),
            contentType: 'application/json',
            success: function (response) {
                alert(response);
               location.reload(); // Refresh the page after successful processing
              window.location = 'profile.php'; // Redirect to profile.php if needed
            },
            error: function (xhr, status, error) {
                alert(error); // Display error message if AJAX request fails
            }
        });

        }

});
