<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paystack Payment Integration</title>
</head>
<body>
    <h1>Pay with Paystack</h1>
    <form id="paymentForm">
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" value="raji@gmail.com" required>
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" id="amount" value="500" required>
        </div>
        <div>
            <button type="submit">Pay Now</button>
        </div>
    </form>

    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener('submit', payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();

            let handler = PaystackPop.setup({
                key: 'pk_test_ba6fc5ef2109b6e491d37ab4c0294d8fc8ee22eb', // Replace with your public key
                email: document.getElementById('email').value,
                amount: document.getElementById('amount').value * 100, // Amount is in kobo
                currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generates a pseudo-unique reference. You can use a more sophisticated reference generation system
                callback: function(response) {
                    // Payment complete! Verify payment on the server
                    verifyPayment(response.reference);
                },
                onClose: function() {
                    alert('Transaction was not completed, window closed.');
                }
            });

            handler.openIframe();
        }

        function verifyPayment(reference) {
            fetch('/verify_payment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ reference: reference })
            })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    alert('Payment verified successfully: ' + data.message);
                    // Handle successful verification here
                } else {
                    alert('Payment verification failed: ' + data.message);
                    // Handle failed verification here
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while verifying payment.');
            });
        }
    </script>
</body>
</html>
