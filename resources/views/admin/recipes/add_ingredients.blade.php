@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Add Ingredients for {{ $recipe->name }}</h3>

</div>

<div class="form">

<form method="POST" action="/recipes/ingredients/add">
@csrf
    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">

    @foreach($iterations as $iteration)
        <x-add_ingredient :i="$loop->index" />
    @endforeach

    <div class="form-label">
        <input type="submit" value="Add Recipe">
    </div>

</form>

</div>

@endsection