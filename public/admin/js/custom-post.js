$(document).ready(function () {
    //Post/
    $(".updatePostStatus").click(function () {
        var post_id = $(this).attr("post_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-post-status",
            data: { post_id: post_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#post-" + resp["post_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#post-" + resp["post_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#post-" + resp["post_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#post-" + resp["post_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#post-" + resp["post_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#post-" + resp["post_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });
    $("#posts-page").DataTable({
        columns: [
            null, // use default column properties for the first column (#)
            { width: "520px" }, // set width for the second column (Post Title)
            null, // use default column properties for the third column (Published)
            null, // use default column properties for the fourth column (Actions)
        ],
        columnDefs: [
            { width: "520px", targets: 1 }, // targets column index 1 (Post Title)
        ],
    });

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
