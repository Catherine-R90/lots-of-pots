@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Update Ingredients for {{ $recipe->name }}</h3>

</div>

<div class="form">

<form method="POST" action="/recipes/ingredients/edit">
@csrf
    <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">

    <x-add_ingredient />

    <div class="form-label">
        <input type="submit" value="Finish Editing Recipe">
    </div>

</form>

</div>

@endsection