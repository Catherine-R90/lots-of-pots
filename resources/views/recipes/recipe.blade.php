@extends('ui.whole_page')

@section('main_content')

<div class="whole-section">

    <div class="section-left">

            @foreach($images as $image)
                <img class="recipe-image" src="{{ asset('storage/app/recipeImages/'.$image->image_one_name) }}">
            @endforeach

        <div class="border-title">
            <p>Products featured in this recipe</p>
        </div>

        <a href="products/15">
            <div class="grey-link">
                <img src="{{ asset('storage/app/productImages/Shiny Knives') }}">
                <p>Product</p>
            </div>
        </a>

    </div>

    <div class="section-right">

        <div class="recipe-boxed-header">
            <h3>{{ $recipe->name }}</h3>
        </div>

        <div class="recipe-description">
            <p>{{ $recipe->description }}</p>
        </div>

        <div class="prep-time">
            <p>Prep Time: {{ $recipe->prep_time }} mins</p>
            
            <p>Cooking Time: {{ $recipe->cook_time }} mins</p>
        </div>

        <div class="ingredients">
            <label>Number of portions </label>

            <select name="portion">
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
            </select>

            <p>Ingredients:</p>

            <ul>
                <div class="ingredient-col">
                    @foreach($ingredients as $ingredient)
                        @if($ingredient != null && $ingredient != " ")
                            <li>{{ $ingredient }}</li>
                        @endif
                    @endforeach
                </div>
            </ul>

        </div>

        <div class="instructions">
            <p>Instructions: </p>
            <ul>
                @foreach($instructions as $instruction)
                    @if($instruction != null)
                    <li>{{ $instruction }}</li>
                    @endif
                @endforeach
            </ul>
        </div>

    </div>

</div>

@endsection