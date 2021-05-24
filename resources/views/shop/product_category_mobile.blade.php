<?php 
use App\Models\ProductImage;
?>

@extends('ui.whole_page')

@section('main_content')

<hr>

<div class="mobile-banner">
    <img src="/images/mobile_banner.png">
</div>

<div class="mobile-header">
    <h1>{{ $category->category }}</h1>
</div>

@foreach($products as $product)

<div class="tile-groups-mobile">
    
    <!-- PRODUCT IMAGES -->
    <?php $imageName = ProductImage::where('product_id', $product->id)->value('image_one_name'); ?>

        <div class="product-tile-mobile">
            <a href="/products/{{ $product->id }}">
                <img style="margin-left:auto; margin-right:auto;" src="{{ asset('storage/app/'.$imageName) }}">
                <p>{{ $product->name}} - £{{ $product->price }}</p>
            </a>
        </div>

</div>
@endforeach

@endsection