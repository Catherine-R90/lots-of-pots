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
