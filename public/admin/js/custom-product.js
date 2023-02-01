$(document).ready(function () {
    //Product -product status update function
    $(".updateProductStatus").click(function () {
        var product_id = $(this).attr("product_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-product-status",
            data: { product_id: product_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#product-" + resp["product_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#product-" + resp["product_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#product-" + resp["product_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#product-" + resp["product_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#product-" + resp["product_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#product-" + resp["product_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });

    //Product Image -product Images status update function
    $(".updateProductImageStatus").click(function () {
        var productImage_id = $(this).attr("productImage_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-product-image-status",
            data: { productImage_id: productImage_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#productImage-" + resp["productImage_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#productImage-" + resp["productImage_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#productImage-" + resp["productImage_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#productImage-" + resp["productImage_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#productImage-" + resp["productImage_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#productImage-" + resp["productImage_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });

    $(".editProductImageSequence").keyup(function (e) {
        sequence = $(this).val();
        productImage_id = $(this).attr("data-productImage_id");
        if (e.which == 13) {
            $.ajax({
                type: "POST",
                url: "/admin/update-product-image-sequence",
                data: { sequence: sequence, productImage_id: productImage_id },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (resp) {
                    Swal.fire({
                        icon: "success",
                        title: "Sequence " + sequence + " has been updated !",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                    }).then(function () {
                        location.reload();
                    });
                },
                error: function (resp) {
                    alert("Error");
                },
            });
        }
    });

    //Product Slug
    $(".checkProductSlug").keyup(function (e) {
        textInput = $(this).val();

        $.ajax({
            type: "POST",
            url: "/admin/check-product-slug",
            data: { textInput: textInput },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                $("input#slug").val(resp.slug);
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });
    $("#products-page").DataTable();
    $("#products-image-page").DataTable();
    //.confirmdelete sections
    $(document).on("click", ".confirmDelete", function () {
        var title = $(this).attr("data-title");
        var link = $(this).attr("data-link");
        Swal.fire({
            title: "Are you sure to delete this section " + title + " ? ",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: "success",
                    title: "Record " + title + " has been deleted !",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                }).then(function () {
                    window.location = link;
                });
            }
        });
    });

    //Select Category Append New Filter List
    $("#category_id").change(function (e) {
        category_id = $(this).val();

        $.ajax({
            type: "POST",
            url: "/admin/get-productfilter-by-category",
            data: { category_id: category_id },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                $("#loadFilters").html(resp.view);
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });
});
