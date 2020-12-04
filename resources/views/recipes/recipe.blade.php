@extends('ui.whole_page')

@section('main_content')

<div class="whole-section">

    <div class="section-left">

            @foreach($images as $image)
                <img class="recipe-image" src="{{ asset('storage/app/recipeImages/'.$image->image_one_name) }}">
            @endforeach

        @if(count($products) > 0)

        <div class="border-title">
            <p>Products featured in this recipe</p>
        </div>

        @foreach($products as $product)

        <a href="/products/{{ $product->id }}">
            <div class="grey-link">
                <img src="{{ asset('storage/app/productImages/'.$productImage->image_one_name) }}">
                <p>{{ $product->name }}</p>                
            </div>
        </a>

        @endforeach
        @endif

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
                        @if($ingredient != null && $ingredient != " " && $ingredient != "  ")
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