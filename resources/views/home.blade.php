<?php 
use App\Models\ProductImage;
use App\Models\RecipeImage;
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

    @foreach($categories as $category)
        @if($category->category == "Pots & Pans" || $category->category == "Knives")
            <a href="/products/category/{{ $category->id }}">
            <?php $product = Product::where('product_category_id', $category->id)->first(); ?>
                <div class="large-tiles">
                    <?php $image = ProductImage::where('product_id', $product->id)->first(); ?>
                    
                    <img src="{{ asset('storage/app/'.$image->image_one_name) }}">
                      
                    {{ $category->category }}
                </div>
            </a>
        @endif
    @endforeach

</div>

<div class="tile-groups">

    @foreach($categories as $category)
        @if($category->category != "Pots & Pans" && $category->category != "Knives")
        <a href="/products/category/{{ $category->id }}">
            <?php $product = Product::where('product_category_id', $category->id)->first(); ?>

            <div class="small-tiles">
                <?php $image = ProductImage::where('product_id', $product->id)->first(); ?>
                
                <img src="{{ asset('storage/app/'.$image->image_one_name) }}">
                          
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
    <?php $imageName = RecipeImage::where('recipe_id', $recipe->id)->value('image_one_name'); ?>

    <div class="small-tiles">
        <a href="/recipes/{{ $recipe->id }}">
            <img src=" {{asset('storage/app/'.$imageName) }}" alt="{{ $imageName }}">
            {{ $recipe->name }}
        </a>
    </div>

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