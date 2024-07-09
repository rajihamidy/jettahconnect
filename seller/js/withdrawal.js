$(document).ready(function () {


    getSellerWithdrawal();

    function getSellerWithdrawal() {
        $.ajax({
            url: '../seller/classes/withdrawal.php',
            method: 'POST',
            data: { GET_SELLER_WITHDRAWAL: 1 },
            success: function (response) {

                console.log(response);
                var resp = $.parseJSON(response);
                if (resp.status == 202) {

                    var customerOrderHTML = "";
                    var sn = 0;

                    $.each(resp.message, function (index, value) {
                        sn++;



                        customerOrderHTML += '<tr>' +
                            '<td class="col-auto">' + sn + '</td>' +

                            //  '<td class="text-wrap">' + value.seller_email +  '</td>' +

                            '<td class="text-wrap">' + value.reference + '</td>' +

                            '<td class="text-wrap">' + value.date_time + '</td>' +
                            '<td class="text-wrap">' + 'N' + parseFloat(value.amount).toLocaleString() + '</td>' +
                            '<td class="text-wrap">' + 'N' + parseFloat(value.previousbalance).toLocaleString() + '</td>' +
                            '<td class="text-wrap">' + 'N' + parseFloat(value.newbalance).toLocaleString() + '</td>'

                        '</tr>';

                    });



                    $("#withdrawal_list").html(customerOrderHTML);

                } else if (resp.status == 303) {
                    $("#withdrawal_list").html(resp.message);
                }

            }
        })

    }
});