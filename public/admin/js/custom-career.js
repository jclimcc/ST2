$(document).ready(function () {
    //Post/
    $(".updateCareerStatus").click(function () {
        var career_id = $(this).attr("career_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-career-status",
            data: { career_id: career_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#career-" + resp["career_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#career-" + resp["career_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#career-" + resp["career_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#career-" + resp["career_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#career-" + resp["career_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#career-" + resp["career_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });
    $("#posts-page").DataTable();

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
});
