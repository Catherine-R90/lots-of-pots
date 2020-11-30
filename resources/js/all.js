$(function () {
    document.getElementById('num_of_ingredients').onchange = function() {
    var i = 1;
    var ingredient = document.getElementById("ingredient".i);
    while(ingredient) {
        ingredient.style.display = 'none';
        ingredient = add_recipe.getElementById(++i);
    }
    document.getElementById(this.value).style.display = 'block';
}
});

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

