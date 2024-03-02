<html>

<head>
    <title>Monnify PayMent Gateway</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<!--https://sdk.monnify.com/plugin/monnify.js/api/v2/disbursements/single -->
<script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>


</head>


<body>


    <div class="container">
        <div class="content">
            <h2 class="text-center bg-primary p-2 mt-2 text-white">Monnify PayMent Integration in PHP</h2>
            <hr>
            <div class="alert alert-success" style="display: none;">
                <strong>info</strong> PayMent Successful <i class="fa fa-check-circle" aria-hidden="true"></i>
            </div>
            <hr>
            <form action="">
                <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" name="name" id="" class="form-control" required placeholder="Enter full name">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" name="amount" class="form-control" required placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="Enter email" class="form-control" required id="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Enter Phone</label>
                    <input type="number" name="phone" id="" class="form-control" required placeholder="Enter phone number">
                </div>
                <div class="form-group">
                    <input type="submit" value="Pay" class="form-control btn-primary">
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
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

        $(function() {
            $("form").submit(function(e) {
                e.preventDefault();
               // let data = $(this).serializeArray();
                // console.log(data);
                 amount = '200';
                    customerName = 'Raji Hamidu';
                    customerEmail = 'raji@live.com'
                    customerMobileNumber = '08067455933';
                // console.log(data[0].value);
                payWithMonnify(amount, customerName, customerEmail, customerMobileNumber);
            });
        });
    </script>

   
</body>

</html>