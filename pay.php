<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://js.paystack.com/v1/inline.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <form>

        <button type="button" onclick="payWithPaystack()"> Pay </button>
    </form>
    <script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	function payWithPaystack() {
		var handler = PaystackPop.setup({
			//key: 'pk_live_0bff82479cc9dbf584a3aefcfc8a11b1676815fd', // Replace with your public key
			key: 'pk_test_ba6fc5ef2109b6e491d37ab4c0294d8fc8ee22eb', // Replace with your public key
			email: 'raji@gmail.com',
			amount: 1000 * 100, // Amount is in kobo, hence multiply by 100
			currency: "NGN",
			ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generate a random reference number
			
			callback: function(response) {
				
				alert('am here');

				
			},
			onClose: function() {
				// Implement what should happen when the modal is closed here
				showCustomAlert('Payment Window Closed.');

			}
		});
		handler.openIframe();
	}

	
</script>

</body>

</html>