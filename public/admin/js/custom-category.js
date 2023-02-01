$(document).ready(function () {
    //Sections Categories/
    $(".updateCategoryStatus").click(function () {
        var category_id = $(this).attr("category_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-category-status",
            data: { category_id: category_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#category-" + resp["category_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#category-" + resp["category_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#category-" + resp["category_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#category-" + resp["category_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#category-" + resp["category_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#category-" + resp["category_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });
    $("#categories-page").DataTable();
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

    //Category Slug
    $(".checkCategorySlug").keyup(function (e) {
        textInput = $(this).val();

        $.ajax({
            type: "POST",
            url: "/admin/check-category-slug",
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
    //Append Categories Level
    $("#section_id").change(function (e) {
        section_id = $(this).val();
        category_id = $("input[name=category_id]").val();

        $.ajax({
            type: "GET",
            url: "/admin/append-categories-level",
            data: { section_id: section_id, category_id: category_id },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                $("#appendCategoryLevel").html(resp);
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });
});
