<?php 
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Cart;
?>

@extends('ui.whole_page')

@section('main_content')

<x-delivery_banner/>

<!-- SHOP CATEGORIES -->
<div class="boxed-header">
    <h3>Shop Categories</h3>
</div>

<div class="tile-groups">

    @foreach ($categories as $category)
        @if($category->id <= 2)
        <?php
        $products = Product::where('product_category_id', $category->id)->get();
        foreach($products as $product) {
            $images = ProductImage::where('product_id', $product->id)->get();
        }
        foreach($images as $image) {
            $imageName = $image->image_one_name;
        }
        ?>

        <a href="/products/category/{{ $category->id }}">
            <div class="large-tiles">
                <img src="{{ asset('storage/app/productImages/'.$imageName) }}">
                {{ $category->category }}
            </div>
        </a>
        @endif
    @endforeach

</div>

<div class="tile-groups">

    @foreach($categories as $category)
        @if($category->id > 2)
        <?php
        $products = Product::where('product_category_id', $category->id)->get();
        foreach($products as $product) {
            $images = ProductImage::where('product_id', $product->id)->get();
        }
        foreach($images as $image) {
            $imageName = $image->image_one_name;
        }
        ?>

        <a href="/products/category/{{ $category->id }}">
        <div class="small-tiles">
            <img src="{{ asset('storage/app/productImages/'.$imageName) }}">
            {{ $category->category }}
        </div>
        </a>
        @endif
    @endforeach

</div>

<!-- RECIPES -->
<div class="boxed-header">
    <h3>Latest Recipes</h3>
</div>

<div class="tile-groups">

@foreach($recipes as $recipe)

    <!-- RECIPE IMAGES -->
    <?php $imageName = DB::table('recipe_images')->where('recipe_id', $recipe->id)->value('image_one_name'); ?>

    <a href="/recipes/{{ $recipe->id }}">
        <div class="small-tiles">
            <img src=" {{asset('storage/app/recipeImages/'.$imageName) }}" alt="{{ $imageName }}">
            {{ $recipe->name }}
        </div>
    </a>
@endforeach

</div>

<!-- SOCIAL MEDIA BANNER -->
<div class="social-media-banner">

    <h3>Keep up to date with our latest recipes!</h3>

</div>

<div class="tile-groups">

    <a href="https://www.facebook.com/">
        <img class="banner-icon" src="images/icons/facebook-black.png">
    </a>

    <a href="https://www.twitter.com/">
        <img class="banner-icon" src="images/icons/twitter-black.png">
    </a>

</div>

@endsection