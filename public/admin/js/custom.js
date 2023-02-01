$(document).ready(function () {
    var timer = null;
    //ADMIN change password
    $(".nav-item").removeClass("active");
    $(".nav-link").removeClass("active");
    $("div.collapse").removeClass("show");
    var livepage = $("nav#sidebar").attr("data-page");
    livepagemenu(livepage);
    function livepagemenu(livepage = null) {
        if (livepage == "admins") {
            //menu Admins
            $("li.nav-item[data-menu=admins]").addClass("active");
            $("li.nav-item[data-menu=admins] div.collapse").addClass("show");
            var pageType = $("li.nav-item[data-menu=admins]").attr("data-page");

            $("a.nav-link[data-page=" + pageType + "]").css({
                background: "#4b4abc",
                color: "#fff",
            });
        }
        // if (
        //     livepage == "view_vendor_details_personal"
        // ) {
        //     //menu Admins
        //     $("li.nav-item[data-menu=admins]").addClass("active");
        //     $("li.nav-item[data-menu=admins] div.collapse").addClass("show");
        //     var pageType = $("li.nav-item[data-menu=admins]").attr("data-page");
        //     alert(pageType);
        //     $("a.nav-link[data-page=" + pageType + "]").css({
        //         background: "#4b4abc",
        //         color: "#fff",
        //     });
        // }
        if (livepage == "order_management") {
            //menu Orders
            $("li.nav-item[data-menu=order_management]").addClass("active");
            $("li.nav-item[data-menu=order_management] div.collapse").addClass(
                "show"
            );
            var pageType = $("li.nav-item[data-menu=order_management]").attr(
                "data-page"
            );

            $("a.nav-link[data-page=" + pageType + "]").css({
                background: "#4b4abc",
                color: "#fff",
            });
        }
        if (livepage == "update_vendor_details") {
            //menu Vendor
            $("li.nav-item[data-menu=update_vendor_details]").addClass(
                "active"
            );
            $(
                "li.nav-item[data-menu=update_vendor_details] div.collapse"
            ).addClass("show");
            var pageType = $(
                "li.nav-item[data-menu=update_vendor_details]"
            ).attr("data-page");

            $("a.nav-link[data-page=" + pageType + "]").css({
                background: "#4b4abc",
                color: "#fff",
            });
        }

        if (livepage == "settings") {
            //settings main update_admin_details
            $("li.nav-item[data-menu=settings]").addClass("active");
            $("li.nav-item[data-menu=settings] div.collapse").addClass("show");
            var pageType = $("li.nav-item[data-menu=settings]").attr(
                "data-page"
            );

            $("a.nav-link[data-page=" + pageType + "]").css({
                background: "#4b4abc",
                color: "#fff",
            });
        }
        //sections /category managements
        if (livepage == "categories_management") {
            //settings main update_admin_details
            $("li.nav-item[data-menu=categories_management]").addClass(
                "active"
            );
            $(
                "li.nav-item[data-menu=categories_management] div.collapse"
            ).addClass("show");
            var pageType = $(
                "li.nav-item[data-menu=categories_management]"
            ).attr("data-page");

            $("a.nav-link[data-page=" + pageType + "]").css({
                background: "#4b4abc",
                color: "#fff",
            });
        }
        //Media managements
        if (livepage == "media_management") {
            //settings main update_admin_details
            $("li.nav-item[data-menu=media_management]").addClass("active");
            $("li.nav-item[data-menu=media_management] div.collapse").addClass(
                "show"
            );
            var pageType = $("li.nav-item[data-menu=media_management]").attr(
                "data-page"
            );

            $("a.nav-link[data-page=" + pageType + "]").css({
                background: "#4b4abc",
                color: "#fff",
            });
        }

        //dashboard
        if (livepage == "dashboard" || livepage == "")
            $("li.nav-item[data-menu=" + livepage + "]").addClass("active");
    }

    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        clearTimeout(timer);

        timer = setTimeout(function () {
            $.ajax({
                type: "POST",
                url: "/admin/check-current-password",
                data: { current_password: current_password },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (resp) {
                    if (resp == "true") {
                        $("#current_password_status").html(
                            "<font color='green'>Current Password is Correct!</font>"
                        );
                    } else {
                        $("#current_password_status").html(
                            "<font color='red'>Current Password is Incorrect!</font>"
                        );
                    }
                },
                error: function (resp) {
                    alert("Error");
                },
            });
        }, 1000);
    });

    //ADMIN admins/adminsd
    $(".updateAdminStatus").click(function () {
        var admin_id = $(this).attr("admin_id");
        var status = $(this).children("i").attr("status");

        $.ajax({
            type: "POST",
            url: "/admin/update-admin-status",
            data: { admin_id: admin_id, status: status },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (resp) {
                if (resp["status"] == "1") {
                    $("#admin-" + resp["admin_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-check");
                    $("#admin-" + resp["admin_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:green");
                    $("#admin-" + resp["admin_id"])
                        .children("i")
                        .attr("status", "1");
                } else {
                    $("#admin-" + resp["admin_id"])
                        .children("i")
                        .attr("class", "mdi mdi-bookmark-outline");
                    $("#admin-" + resp["admin_id"])
                        .children("i")
                        .attr("style", "font-size:25px;color:red");
                    $("#admin-" + resp["admin_id"])
                        .children("i")
                        .attr("status", "0");
                }
            },
            error: function (resp) {
                alert("Error");
            },
        });
    });

    $("#sections-page").DataTable();
});
