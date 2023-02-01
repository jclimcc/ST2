$(document).ready(function () {
    //Sections Categories/
    $(".updateBrandStatus").click(function () {
        var brand_id = $(this).attr("brand_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-brand-status",
            data: { brand_id: brand_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#brand-" + resp["brand_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#brand-" + resp["brand_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#brand-" + resp["brand_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#brand-" + resp["brand_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#brand-" + resp["brand_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#brand-" + resp["brand_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });
    $("#brands-page").DataTable();

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

    //Brand Slug
    $(".checkBrandSlug").keyup(function (e) {
        textInput = $(this).val();

        $.ajax({
            type: "POST",
            url: "/admin/check-brand-slug",
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
});
