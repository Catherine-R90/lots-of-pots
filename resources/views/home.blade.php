@extends('ui.whole_page')

@section('main_content')

<x-delivery_banner/>

<!-- SHOP CATEGORIES -->
<div class="boxed-header">
    <h3>Shop Categories</h3>
</div>

<div class="tile-groups">

    @foreach ($primaryCategories as $pCategory)
        <a href="/products/category/{{ $pCategory->id }}">
            <div class="large-tiles">
                <img src="{{ asset('storage/app/productImage/'.$imageName) }}">
                {{ $pCategory->category }}
            </div>
        </a>
    @endforeach

</div>

<div class="tile-groups">

    @foreach($secondaryCategories as $sCategory)
        <a href="/products/category/{{ $sCategory->id }}">
        <div class="small-tiles">
            <img src="images/placeholder-sml.png">
            {{ $sCategory->category }}
        </div>
    </a>
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