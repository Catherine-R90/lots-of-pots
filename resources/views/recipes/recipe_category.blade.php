<?php 
use App\Models\RecipeImages;
use Illuminate\Support\Facades\DB;
?>

@extends('ui.whole_page')

@section('main_content')

<div class="sub-nav">

    <nav>

    @foreach ($allCategories as $categoryLink)
        <a href="/recipes/category/{{ $categoryLink->id }}">
            {{ $categoryLink->category }}
        </a>
    @endforeach

    </nav>

</div>

<hr>

<div class="boxed-header">
    <h3>{{ $category->category }}</h3>
</div>

<div class="tile-groups">

@foreach($recipes as $recipe)

<?php $cooking_time = ($recipe->prep_time + $recipe->cook_time); ?>

     <!-- RECIPE IMAGES -->
     <?php
    $imageName = DB::table('recipe_images')->where('recipe_id', $recipe->id)->value('image_one_name');
    ?>

    <a href="/recipes/{{ $recipe->id }}">
        <div class="small-tiles">
            <img src=" {{asset('storage/app/recipeImages/'.$imageName) }}">
            <div>{{ $recipe->name }}</div>
            <div>Cooking time - {{ $cooking_time }} minutes</div>
        </div>
    </a>

@endforeach

</div>

@endsection