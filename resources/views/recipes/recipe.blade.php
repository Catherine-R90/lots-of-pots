@extends('ui.whole_page')

@section('main_content')

<div class="whole-recipe">

    <div class="recipe-left">

            @foreach($images as $image)
                <img class="recipe-image" src="{{ asset('storage/app/recipeImages/'.$image->image_one_name) }}">
            @endforeach

        @if($products != null)

        <div class="border-title">
            <p>Products featured in this recipe</p>
        </div>

        @foreach($products as $product)

        <a href="/products/{{ $product->id }}">
            <div class="recipe-product-link">

                @foreach($productImages as $productImage)
                @if($productImage->product_id == $product->id)
                    <img src="{{ asset('storage/app/'.$productImage->image_one_name) }}">
                @endif
                @endforeach

                <p>{{ $product->name }}</p>                
            </div>
        </a>

        @endforeach
        @endif

    </div>

    <div class="recipe-right">

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

        <x-ingredient_portion :agent="$agent" :portion="$portion" :ingredients="$ingredients" :id="$recipe->id" />

        <div class="instructions">
            <p>Instructions: </p>
            <ol>
                @foreach($instructions as $instruction)
                    @if($instruction != null)
                    <li>{{ $instruction }}</li>
                    @endif
                @endforeach
            </ol>
        </div>

    </div>


</div>

    <div class="boxed-header">
        <h3>Tell us what you think!</h3>
    </div>

    <x-add_comment :agent="$agent" :id="$recipe->id" />

    <x-comment_section :agent="$agent" :comments="$comments" :userSession="$userSession" />

@endsection