@extends('ui.whole_page')

@section('main_content')

<hr>

<div class="mobile-banner">
    <img src="/images/mobile_banner.png">
</div>

<div class="mobile-header">
    <h1>{{ $product->name }}</h1>
</div>

<x-carousel :imageOne="$imageOne" :imageTwo="$imageTwo" :imageThree="$imageThree" :imageFour="$imageFour" />

<div class="mobile-product-info">

    <p class="mobile-price">£{{$product->price}}</p>

    <form class="mobile-form" name="add_to_cart" method="POST" action="/cart/product/add/{{ $product->id }}">
        @csrf

            @if($product->stock > 0)
                <label>Quantity</label>
                <input type="number" id="quantity" name="quantity" value="1">
            @else
                <p class="notification">Out of stock</p>
            @endif
                
            <div>
                <input type="submit" value="Add to cart">
            </div>
    </form>

    <h3>About this product</h3>

    <p>{{$product->description}}</p>
    <ul>
        @foreach($details as $detail)
        @if($detail != null)
            <li>{{ $detail }}</li>
        @endif
        @endforeach
    </ul>

</div>

@endsection