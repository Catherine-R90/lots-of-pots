@extends('ui.whole_page')

@section('main_content')

<x-delivery_banner/>

<div class="whole-section">

    <div class="section-left">

    <!-- IMAGES -->
    @if($imageTwo == null)

    <div class="product-image">
        <img src="{{ asset('storage/app/productImages/'.$imageOne) }}">
    </div>

    @else

    <x-carousel :imageOne="$imageOne" :imageTwo="$imageTwo" :imageThree="$imageThree" :imageFour="$imageFour" />

    @endif

    @if(count($recipes) > 0)

    <div class="border-title">
        <p>Recipes featuring this product</p>
    </div>

    @foreach($recipes as $recipe)

    <a href="/recipes/{{ $recipe->id }}">
        <div class="grey-link">
            <img src="{{ asset('storage/app/recipeImages/'.$recipeImage->image_one_name) }}">
            <p>{{ $recipe->name }}</p>
        </div>
    </a>

    @endforeach

    @endif

    </div>

    <div class="section-right">

        <div class="boxed-header">
            <h3>{{ $product->name }}</h3>
        </div>

        @if($product->stock > 0)
        <div class="price-quant">

            <p>£{{ $product->price }}</p>

            <div id="add_to_cart">

                <form name="add_to_cart" action="">

                    <input type="hidden" name="id" id="id" value="{{ $product->id }}">

                    <div class="price-quant">
                        <div class="price-form-label">

                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" value="1">
                            In stock
                            
                        </div>

                        <input class="grey-link" type="submit" value="Add to cart">

                    </div>
                </form>
            </div>

        </div>

        @else

        <p>Out of Stock</p>

        @endif

        <div class="about-product">

            <h3>About this product</h3>

            <ul>
                <li>{{ $product->details }}
            </ul>

            <p>{{ $product->description }}</p>

        </div>

        <div class="grey-link">
            <a href="/cart/{id}">Go to cart</a>
        </div>
</div>

@endsection