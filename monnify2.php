<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
</head>
<body>
    <button onclick="processfund();">Process</button>
</body>
<script type="text/javascript">
        function payWithMonnify(amount, customerName, customerEmail, customerMobileNumber) {
            MonnifySDK.initialize({

                amount: amount,
                currency: "NGN",
                fee: 20,
                reference: new String((new Date()).getTime()),
                customerFullName: customerName,
                customerEmail: customerEmail,
                customerMobileNumber: customerMobileNumber,
                apiKey: "MK_TEST_ENTY115CZW",
                contractCode: "6073096540",
                paymentDescription: "My depo",



                // reference: '' + Math.floor((Math.random() * 1000000000) + 1),
                //  customerName,
                //  customerEmail,
                //  customerMobileNumber,
                //  apiKey: "", //Your api key
                //  contractCode: "", //Your contract code
                //  paymentDescription: "Payment of Product",
                // isTestMode: true, //True or False for testmode
                paymentMethods: ["CARD", "ACCOUNT_TRANSFER"],
                onComplete: function(response) {
                    //Implement what happens when transaction is completed.
                    console.log(response);
                    document.querySelector('.alert').style.display = "block";
                },
                onClose: function(data) {
                    //Implement what should happen when the modal is closed here
                    console.log(data);
                }
            });
        }

        function processfund(){

            amount = '200';
                    customerName = 'Raji Hamidu';
                    customerEmail = 'raji@live.com'
                    customerMobileNumber = '08067455933';
                // console.log(data[0].value);
                payWithMonnify(amount, customerName, customerEmail, customerMobileNumber);

        }
               // let data = $(this).serializeArray();
                // console.log(data);
              
            
       
    </script>

</html>