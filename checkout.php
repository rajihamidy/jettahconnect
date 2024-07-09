<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script>
        function initiatePaystackPayment(email, amount) {
            fetch('https://www.jettahconnect.com.ng/cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    email: email,
                    amount: amount
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    window.location.href = data.data.authorization_url;
                } else {
                    alert('Error initializing transaction');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>
    <h1>Checkout Page</h1>
    <form onsubmit="event.preventDefault(); initiatePaystackPayment(document.getElementById('email').value, document.getElementById('amount').value);">
        <input type="email" id="email" placeholder="Email" required>
        <input type="number" id="amount" placeholder="Amount" required>
        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
