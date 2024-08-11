$(document).ready(function () {
    getCategories();

    function getCategories() {
        $.ajax({
            url: '../seller/classes/Products.php',
            method: 'POST',
            data: { GET_CATEGORIES: 1 },
            success: function (response) {
                console.log("Categories fetched: ", response);
                var resp = $.parseJSON(response);

                var brandHTML = '';
                var sn = 0;
                $.each(resp.message, function (index, value) {
                    sn++;
                    brandHTML += '<tr>' +
                        '<td>' + sn + '</td>' +
                        '<td>' + value.cat_title + '</td>' +
                        '<td><a class="btn btn-sm btn-info edit-category"><span style="display:none;">' + JSON.stringify(value) + '</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a cid="' + value.cat_id + '" class="btn btn-sm btn-danger delete-category"><i class="fas fa-trash-alt"></i></a></td>' +
                        '</tr>';
                });

                $("#category_list").html(brandHTML);
            }
        });
    }

    $(".add-category").on("click", function () {
        $.ajax({
            url: '../seller/classes/Products.php',
            method: 'POST',
            data: $("#add-category-form").serialize(),
            success: function (response) {
                var resp = $.parseJSON(response);
                if (resp.status == 202) {
                    getCategories();
                    $("#add-category-form")[0].reset();
                    showCustomAlert(resp.message);
                } else if (resp.status == 303) {
                    showCustomAlert(resp.message);
                }
                $("#add_category_modal").modal('hide');
            }
        });
    });

    $(document.body).on("click", ".edit-category", function () {
        var cat = $.parseJSON($.trim($(this).children("span").html()));
        console.log("Editing category: ", cat);  // Debug line

        $("input[name='e_cat_title']").val(cat.cat_title);
        $("input[name='cat_id']").val(cat.cat_id);

        $("#edit_category_modal").modal('show');
    });

    $(".edit-category-btn").on('click', function () {
        $.ajax({
            url: '../seller/classes/Products.php',
            method: 'POST',
            data: $("#edit-category-form").serialize(),
            success: function (response) {
                var resp = $.parseJSON(response);
                if (resp.status == 202) {
                    getCategories();
                    showCustomAlert(resp.message);
                } else if (resp.status == 303) {
                    showCustomAlert(resp.message);
                }
                $("#edit_category_modal").modal('hide');
            }
        });
    });

    $(document.body).on('click', '.delete-category', function () {
        var cid = $(this).attr('cid');

        $('#confirm_message').text('Are you sure you want to delete this category?');
        $('#confirm_modal').modal('show');

        $('#confirm_yes').off('click').on('click', function() {
            $.ajax({
                url: '../seller/classes/Products.php',
                method: 'POST',
                data: { DELETE_CATEGORY: 1, cid: cid },
                success: function(response) {
                    var resp = $.parseJSON(response);
                    if (resp.status == 202) {
                        showCustomAlert(resp.message);
                        getCategories();
                    } else if (resp.status == 303) {
                        showCustomAlert(resp.message);
                    }
                }
            });
            $('#confirm_modal').modal('hide');
        });
    });
});
