    $(function () {
        $("form").on("submit", function (e) {

            var dataString = $(this).serialize;

            // alert(dataString); return false;
            $.ajax({
                type: "POST",
                url: "/product/add/{id}",
                data: dataString,
                success: function () {
                    $("#add_to_cart").html("<div id='mesage'></div>");
                    $("#message")
                        .html("<h2>Product added!</h2>")
                        .hide();
                }
            });

            e.preventDefault();
        });
    });

