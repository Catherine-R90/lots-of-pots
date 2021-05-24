@extends('ui.whole_page')

@section('main_content')

<div class="mobile-header">
    <h1>{{$recipe->name}}</h1>
</div>

<div class="mobile-recipe">

    @foreach($images as $image)
        <img class="recipe-image" src="{{ asset('storage/app/recipeImages/'.$image->image_one_name) }}">
    @endforeach

    <div class="mobile-recipe-time">
        <p>Prep Time: {{$recipe->prep_time}} minutes</p>
        <p>Cooking Time: {{$recipe->cook_time}} minutes</p>
    </div>

    <hr>

    <div class="mobile-recipe-desc">
        <p>{{$recipe->description}}</p>
    </div>

    <x-ingredient_portion :agent="$agent" :portion="$portion" :ingredients="$ingredients" :id="$recipe->id" />

    <div class="mobile-instructions">
        <p>Instructions: </p>
        <ol>
            @foreach($instructions as $instruction)
                @if($instruction != null)
                <li>{{ $instruction }}</li>
                @endif
            @endforeach
        </ol>
    </div>

    <hr>

    @if($products != null)

        <h3>Products used in this recipe</h3>

        @foreach($products as $product)

            <div class="mobile-recipe-product">
                <a href="/products/{{ $product->id }}">
                    @foreach($productImages as $productImage)
                        @if($productImage->product_id == $product->id)
                            <img src="{{ asset('storage/app/'.$productImage->image_one_name) }}">
                        @endif
                    @endforeach

                    <p>{{ $product->name }}</p>                
                </a>
            </div>

        @endforeach

    @endif

    <hr>

    <h3>Tell us what you think!</h3>

    <x-add_comment :agent="$agent" :id="$recipe->id" />

    <x-comment_section :agent="$agent" :comments="$comments" :userSession="$userSession" />
    
</div>

@endsection