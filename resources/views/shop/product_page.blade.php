@extends('ui.whole_page')

@section('main_content')

<x-delivery_banner/>

<div class="product-whole">

    <div class="product-left">

    <!-- IMAGES -->
    @if($imageTwo == null)

    <div class="product-image">
        <img src="{{ asset('storage/app/'.$imageOne) }}">
    </div>

    @else

    <x-carousel :imageOne="$imageOne" :imageTwo="$imageTwo" :imageThree="$imageThree" :imageFour="$imageFour" />

    @endif

    @if($recipes != null)

    <div class="border-title">
        <p>Recipes featuring this product</p>
    </div>

        @foreach($recipes as $recipe)

        <a href="/recipes/{{ $recipe->id }}">
            <div class="product-recipe">

                @foreach($recipeImages as $recipeImage)
                @if($recipeImage->recipe_id == $recipe->id)
                    <img src="{{ asset('storage/app/'.$recipeImage->image_one_name) }}">
                @endif
                @endforeach

                <p>{{ $recipe->name }}</p>

            </div>
        </a>
    @endforeach

    @endif

    </div>

    <div class="product-right">

        <div class="boxed-header">
            <h3>{{ $product->name }}</h3>
        </div>

        @if($product->stock > 0)
        <div class="price-quant">

            <p>£{{ $product->price }}</p>

            <div id="add_to_cart">

                <form name="add_to_cart" method="POST" action="/cart/product/add/{{ $product->id }}">
                    @csrf

                    <div class="price-quant">
                        <div class="price-form-label">

                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" value="1">
                            In stock
                            
                        </div>

                        <div class="grey-link">
                            <input  type="submit" value="Add to cart">
                        </div>
                    </div>
                </form>
            </div>

        </div>

        @else

        <p>Out of Stock</p>

        @endif

        <div class="about-product">

            <h3>About this product</h3>

            <p>{{ $product->description }}</p>

            <ul>
                @foreach($details as $detail)
                @if($detail != null)
                    <li>{{ $detail }}</li>
                @endif
                @endforeach
            </ul>


        </div>

        <div class="grey-link">
            <a href="/cart">Go to cart</a>
        </div>
</div>

@endsection