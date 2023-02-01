$(document).ready(function () {
    //Filter status/
    $(".updateFiltersStatus").click(function () {
        var filter_id = $(this).attr("filter_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-filter-status",
            data: { filter_id: filter_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });
    //Filters Values status/
    $(".updateFiltersValuesStatus").click(function () {
        var filter_id = $(this).attr("filter_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-filters-values-status",
            data: { filter_id: filter_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#filter-" + resp["filter_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });

    $("#filters-page").DataTable();

    //.confirmdelete sections
    $(document).on("click", ".confirmDelete", function () {
        var title = $(this).attr("data-title");
        var link = $(this).attr("data-link");
        Swal.fire({
            title: "Are you sure to delete this Filter " + title + " ? ",
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

    $(document).on("click", ".confirmDeleteFilterValues", function () {
        var title = $(this).attr("data-title");
        var link = $(this).attr("data-link");
        Swal.fire({
            title: "Are you sure to delete this Filter Values " + title + " ? ",
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
