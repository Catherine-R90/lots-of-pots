@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Edit Products for {{ $recipe->name }}</h3>

</div>


@if (count($errors) > 0)

<div class="alert alert-danger">

    <ul>

    @foreach ($errors->all() as $error)

    <li>{{ $error }}</li>

    @endforeach

    </ul>

</div>

@endif

<form method="POST" action="/recipes/products/edit">
    @csrf

    <input type="hidden" value="{{ $recipe->id }}" name="recipe_id">

    <div class="form-label">

        <select name="product_id[]" multiple>

            @foreach($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->name }}
                </option>
            @endforeach

        </select>

    </div>

    <div class="form-label">
        <input type="submit" value="Continue to Ingredients">
    </div>

</form>

@endsection