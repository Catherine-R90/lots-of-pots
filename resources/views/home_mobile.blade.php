<?php 
use App\Models\RecipeImage;
?>

@extends('ui.whole_page')

@section('main_content')

<div class="mobile-banner">
    <img src="/images/mobile_banner.png">
</div>

<div class="mobile-header">
    <h1>Product Categories</h1>
</div>

@foreach($categories as $category)
<div class="mobile-subheader">
    <a href="/products/category/{{ $category->id }}"><h3>{{$category->category}}</h3></a>
</div>
@endforeach

<div class="mobile-header">
    <h1>Latest Recipes</h1>
</div>

@foreach($recipes as $recipe)
<?php $imageName = RecipeImage::where('recipe_id', $recipe->id)->value('image_one_name'); ?>
<div class="mobile-home-recipes">
    <a href="/recipes/{{ $recipe->id }}">
        <img src="{{asset('storage/app/recipeImages/'.$imageName) }}">
        <p>{{ $recipe->name }}</p>
    </a>
</div>
@endforeach

@endsection