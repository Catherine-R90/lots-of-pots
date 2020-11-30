<script src="{{ asset('/resources/js/all.js') }}"></script>

@extends('ui.whole_page')

@section('main_content')

<x-delivery_banner/>

<div class="whole-section">
    <div class="section-left">

    <!-- IMAGES -->

    @foreach($imageNames as $imageName)
        @if($imageName != null)
            @if($loop->first)
            <div class="primary-image">
                <img src="{{  asset('storage/app/productImages/'.$imageName)  }}">
            </div>
            @else
            <div class="secondary-image">
                <img src="{{  asset('storage/app/productImages/'.$imageName)  }}">
            </div>
            @endif
        @endif
    @endforeach
        
            <div class="border-title">
                <p>Recipes featuring this product</p>
            </div>

            <a href="recipes/1">
                <div class="grey-link">
                    <img src="{{ asset('storage/app/recipeImages/apple') }}">
                    <p>Recipe</p>
                </div>
            </a>

    </div>

    <div class="section-right">

        <div class="boxed-header">
            <h3>{{ $product['name'] }}</h3>
        </div>

        <div class="price-quant">

            <p>£{{ $product['price'] }}</p>

            <div id="add_to_cart">

                <form name="add_to_cart" action="">

                    <input type="hidden" name="id" id="id" value="{{ $product->id }}">

                    <div class="price-quant">
                        <div class="price-form-label">

                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" value="1">
                            
                        </div>

                        <input class="grey-link" type="submit" value="Add to cart">

                    </div>
                </form>
            </div>

        </div>

        <div class="about-product">

            <h3>About this product</h3>

            <ul>
                <li>{{ $product["details"] }}
            </ul>

            <p>{{ $product["description"] }}</p>

        </div>

        <div class="grey-link">
            <a href="/cart/{id}">Go to cart</a>
        </div>
</div>

@endsection