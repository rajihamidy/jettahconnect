$(document).ready(function() {
    getBrands();

    function getBrands() {
        $.ajax({
            url: '../seller/classes/Products.php',
            method: 'POST',
            data: { GET_BRAND: 1 },
            success: function(response) {
                var resp = $.parseJSON(response);
                var brandHTML = '';
                var sn = 0;
                $.each(resp.message, function(index, value) {
                    sn++;
                    brandHTML += '<tr>'+
                                    '<td>'+ sn +'</td>'+
                                    '<td>'+ value.brand_title +'</td>'+
                                    '<td>'+
                                        '<a class="btn btn-sm btn-info edit-brand" data-id="'+ value.brand_id +'" data-name="'+ value.brand_title +'">'+
                                            '<i class="fas fa-pencil-alt"></i>'+
                                        '</a>&nbsp;'+
                                        '<a class="btn btn-sm btn-danger delete-brand" bid="'+ value.brand_id +'">'+
                                            '<i class="fas fa-trash-alt"></i>'+
                                        '</a>'+
                                    '</td>'+
                                '</tr>';
                });
                $("#brand_list").html(brandHTML);
            },
            error: function() {
                console.log("Error fetching brands.");
            }
        });
    }

    $(".add-brand").on("click", function() {
        $.ajax({
            url: '../seller/classes/Products.php',
            method: 'POST',
            data: $("#add-brand-form").serialize(),
            success: function(response) {
                var resp = $.parseJSON(response);
                if (resp.status == 202) {
                    getBrands();
                    $("#add_brand_modal").modal('hide');
                    showCustomAlert(resp.message);
                } else if (resp.status == 303) {
                    showCustomAlert(resp.message);
                }
            },
            error: function() {
                console.log("Error adding brand.");
            }
        });
    });

    $(document.body).on('click', '.delete-brand', function() {
        var bid = $(this).attr('bid');
        
        $('#confirm_message').text('Are you sure you want to delete this brand?');
        $('#confirm_modal').modal('show');

        $('#confirm_yes').off('click').on('click', function() {
            $.ajax({
                url: '../seller/classes/Products.php',
                method: 'POST',
                data: { DELETE_BRAND: 1, bid: bid },
                success: function(response) {
                    var resp = $.parseJSON(response);
                    if (resp.status == 202) {
                        getBrands();
                        showCustomAlert(resp.message);
                    } else if (resp.status == 303) {
                        showCustomAlert(resp.message);
                    }
                },
                error: function() {
                    console.log("Error deleting brand.");
                }
            });
            $('#confirm_modal').modal('hide');
        });
    });

    $(".edit-brand-btn").on("click", function() {
        $.ajax({
            url: '../seller/classes/Products.php',
            method: 'POST',
            data: $("#edit-brand-form").serialize(),
            success: function(response) {
                var resp = $.parseJSON(response);
                if (resp.status == 202) {
                    getBrands();
                    $("#edit_brand_modal").modal('hide');
                    showCustomAlert(resp.message);
                } else if (resp.status == 303) {
                    showCustomAlert(resp.message);
                }
            },
            error: function() {
                console.log("Error updating brand.");
            }
        });
    });

    function showCustomAlert(message) {
        // Custom alert function to display success/error messages
        console.log(message); // For now, just log the message. Replace with custom alert implementation.
    }
});
