$(document).ready(function () {
    //Coupon/
    $(".updateCouponStatus").click(function () {
        var coupon_id = $(this).attr("coupon_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-coupon-status",
            data: { coupon_id: coupon_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#coupon-" + resp["coupon_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#coupon-" + resp["coupon_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#coupon-" + resp["coupon_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#coupon-" + resp["coupon_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#coupon-" + resp["coupon_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#coupon-" + resp["coupon_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });
    $("#coupons-page").DataTable();

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
    // $("input[type=radio][name=coupon_option]").change(function () {
    //     if (this.value == "Manual") $(".coupon_code_input").show();
    //     if (this.value == "Auto") $(".coupon_code_input").hide();
    // });

    $(".multiple-select-optgroup-field").select2({
        theme: "bootstrap-5",
        width: $(this).data("width")
            ? $(this).data("width")
            : $(this).hasClass("w-100")
            ? "100%"
            : "style",
        placeholder: $(this).data("placeholder"),
        closeOnSelect: false,
    });

    $(".date").datepicker({
        format: "yyyy-m-d",
    });
});
