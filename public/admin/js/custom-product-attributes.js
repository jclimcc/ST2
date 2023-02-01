$(document).ready(function () {
    $("#products-attribute-page").DataTable();

    var maxField = 10; //Input fields increment limitation
    var addButton = $(".add_button"); //Add button selector
    var wrapper = $(".field_wrapper"); //Input field wrapper
    var fieldHTML =
        '<div> <input required style="width:120px" type="text" name="variation[]" placeholder="Variation"/> <input required style="width:120px" type="text" name="sku[]" placeholder="SKU"/> <input required style="width:120px" type="number" name="price[]" placeholder="Price"/> <input required style="width:120px" type="number" name="stock[]" placeholder="Stock"/> <input required style="width:120px" type="number" name="sequence[]" placeholder="Sequence"/> <a href="javascript:void(0);" class="remove_button" title="Remove"><i style="font-size:25px; vertical-align: middle;" class="mdi mdi mdi-minus-circle"></i></a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function () {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on("click", ".remove_button", function (e) {
        e.preventDefault();
        $(this).parent("div").remove(); //Remove field html
        x--; //Decrement field counter
    });
    //ProductAttribute:sequence update
    $(".editProductAttributeSequence").keydown(function (e) {
        sequence = $(this).val();
        productAttribute_id = $(this).attr("data-productAttribute_id");

        //when press Enter
        if (e.which == 13) {
            $.ajax({
                type: "POST",
                url: "/admin/update-product-attribute-sequence",
                data: {
                    sequence: sequence,
                    productAttribute_id: productAttribute_id,
                },
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

    //productAttribute:price update
    $(".editProductAttributePrice").keyup(function (e) {
        price = $(this).val();
        productAttribute_id = $(this).attr("data-productAttribute_id");
        //when press Enter
        if (e.which == 13) {
            $.ajax({
                type: "POST",
                url: "/admin/update-product-attribute-price",
                data: {
                    price: price,
                    productAttribute_id: productAttribute_id,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (resp) {
                    Swal.fire({
                        icon: "success",
                        title: "Prices " + price + " has been updated !",
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

    //productAttribute:stock update
    $(".editProductAttributeStock").keyup(function (e) {
        stock = $(this).val();
        productAttribute_id = $(this).attr("data-productAttribute_id");
        //when press Enter
        if (e.which == 13) {
            $.ajax({
                type: "POST",
                url: "/admin/update-product-attribute-stock",
                data: {
                    stock: stock,
                    productAttribute_id: productAttribute_id,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (resp) {
                    Swal.fire({
                        icon: "success",
                        title: "Stock " + stock + " has been updated !",
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

    //ProductAttribute:available
    $(".updateProductAttributeAvailable").click(function () {
        var productAttribute_id = $(this).attr("productAttribute_id");
        var available = $(this).children("i").attr("available");

        $.ajax({
            type: "POST",
            url: "/admin/update-product-attribute-available",
            data: {
                productAttribute_id: productAttribute_id,
                available: available,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["available"] == "1") {
                    $(
                        "#productAttributeAvailable-" +
                            resp["productAttribute_id"]
                    )
                        .children("i")
                        .attr("class", "mdi mdi-eye");
                    $(
                        "#productAttributeAvailable-" +
                            resp["productAttribute_id"]
                    )
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $(
                        "#productAttributeAvailable-" +
                            resp["productAttribute_id"]
                    )
                        .children("i")
                        .attr("available", "1");
                } else {
                    $(
                        "#productAttributeAvailable-" +
                            resp["productAttribute_id"]
                    )
                        .children("i")
                        .attr("class", "mdi mdi-eye-off");
                    $(
                        "#productAttributeAvailable-" +
                            resp["productAttribute_id"]
                    )
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $(
                        "#productAttributeAvailable-" +
                            resp["productAttribute_id"]
                    )
                        .children("i")
                        .attr("available", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });

    //ProductAttribute:status
    $(".updateProductAttributeStatus").click(function () {
        var productAttribute_id = $(this).attr("productAttribute_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-product-attribute-status",
            data: {
                productAttribute_id: productAttribute_id,
                status: status,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#productAttributeStatus-" + resp["productAttribute_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#productAttributeStatus-" + resp["productAttribute_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#productAttributeStatus-" + resp["productAttribute_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#productAttributeStatus-" + resp["productAttribute_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#productAttributeStatus-" + resp["productAttribute_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#productAttributeStatus-" + resp["productAttribute_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });

    //.confirmdelete sections
    $(document).on("click", ".confirmDelete", function () {
        var title = $(this).attr("data-title");
        var link = $(this).attr("data-link");
        Swal.fire({
            title:
                "Are you sure to delete this Attribute:  <br><b>" +
                title +
                "</b> ? ",
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
});
