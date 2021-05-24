<?php 
use App\Models\ProductImage;
?>

@extends('ui.whole_page')

@section('main_content')

<div class="sub-nav">

    <nav>

    @foreach ($allCategories as $categoryLink)
        <a href="/products/category/{{ $categoryLink->id }}">
            {{ $categoryLink->category }}
        </a>
    @endforeach

    </nav>

</div>

<hr>

<x-delivery_banner/>

<div class="boxed-header">
    <h3>{{ $category->category }}</h3>
</div>



<div class="tile-groups">
    
    @foreach($products as $product)
        <!-- PRODUCT IMAGES -->
        <?php
        $imageName = ProductImage::where('product_id', $product->id)->value('image_one_name');
        ?>

        <div class="small-tiles">
            <a href="/products/{{ $product->id }}">
                <img src="{{ asset('storage/app/'.$imageName) }}">
                {{ $product->name}} - £{{ $product->price }}
            </a>
        </div>
    @endforeach

</div>

@endsection