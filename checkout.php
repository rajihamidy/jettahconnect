<!DOCTYPE html>
<html>
<head>
    <title>Paystack Payment</title>
    <script src="https://js.paystack.co/v1/inline.js"></script>
</head>
<body>
    <button id="paystackButton" style="display:none;">Pay Now</button>

    <script>
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        var total_amount = getParameterByName('amount');
        var buyer_name = getParameterByName('name');
        var buyer_email = getParameterByName('email');
        var buyer_mobile = getParameterByName('mobile');

        function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: 'pk_live_0bff82479cc9dbf584a3aefcfc8a11b1676815fd', // Replace with your public key
                email: buyer_email,
                amount: total_amount * 100, // Amount is in kobo, hence multiply by 100
                currency: "NGN",
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generate a random reference number
                metadata: {
                    custom_fields: [{
                            display_name: "Mobile Number",
                            variable_name: "mobile_number",
                            value: buyer_mobile
                        },
                        {
                            display_name: "Buyer Name",
                            variable_name: "buyer_name",
                            value: buyer_name
                        }
                    ]
                },
                callback: function(response) {
                    // Implement what happens when transaction is completed.
                    var prod_owner = [];
                    var user_id = [];
                    var product_id = [];
                    var qty = [];
                    var trx_id = [];
                    var seller_Email = [];
                    var seller_id = [];
                    var delM = getParameterByName('delM');
                    var address = getParameterByName('address');

                    $(".row").each(function() {
                        var $row = $(this);
                        prod_owner.push($row.find("[name='prod_owner[]']").val());
                        user_id.push($row.find("[name='user_id[]']").val());
                        product_id.push($row.find("[name='product_id[]']").val());
                        trx_id.push($row.find("[name='trx_id[]']").val());
                        seller_Email.push($row.find("[name='seller_Email[]']").val());
                        qty.push($row.find("[name='qty[]']").val());
                        seller_id.push($row.find("[name='seller_id[]']").val());
                    });

                    var combinedArray = user_id.map(function(_, i) {
                        return {
                            prod_owner: prod_owner[i],
                            user_id: user_id[i],
                            product_id: product_id[i],
                            qty: qty[i],
                            trx_id: trx_id[i],
                            seller_Email: seller_Email[i],
                            seller_id: seller_id[i],
                            delM: delM,
                            address: address
                        };
                    });

                    var filteredArray = combinedArray.filter(function(record) {
                        return Object.values(record).every(function(value) {
                            return value !== null && value !== undefined && value !== '';
                        });
                    });

                    $.ajax({
                        url: 'action3.php',
                        method: 'POST',
                        data: JSON.stringify(filteredArray),
                        contentType: 'application/json',
                        success: function(response) {
                            alert('Payment successful: ' + response.reference);
                            // Handle success
                            location.reload();
                            window.location = 'profile.php';
                        },
                        error: function(xhr, status, error) {
                            alert('Payment failed: ' + error);
                        }
                    });
                },
                onClose: function() {
                    // Implement what should happen when the modal is closed here
                    alert('Payment Window Closed.');
                }
            });
            handler.openIframe();
        }

        document.getElementById('paystackButton').click();
        window.onload = function() {
            payWithPaystack();
        };
    </script>
</body>
</html>
