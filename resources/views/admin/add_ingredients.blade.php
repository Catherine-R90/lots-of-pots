@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Add Recipe</h3>

</div>

@if($numOfIngredients == 1) {
<div class="form">

<form method="POST" action="/recipes/ingredients/add">
@csrf

    <label>Ingredient</label>
    <input type="text" name="indredient_one">

    <label>Quantity FOR ONE PORTION</label>
    <input type="number" name="ingredient_quant_one">

    <input type="Add">

</form>

</div>
}
@elseif($numOfIngredients == 2) {
<div class="form">

<form method="POST" action="/recipes/ingredients/add">
@csrf

    <label>Ingredient</label>
    <input type="text" name="indredient_one">

    <label>Quantity FOR ONE PORTION</label>
    <input type="number" name="ingredient_quant_one">

    <label>Ingredient</label>
    <input type="text" name="indredient_two">

    <label>Quantity FOR ONE PORTION</label>
    <input type="number" name="ingredient_quant_two">

    <input type="Add">

</form>

</div>
}
@endif


@endsection