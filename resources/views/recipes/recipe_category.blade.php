<?php 
use App\Models\RecipeImage;
?>

@extends('ui.whole_page')

@section('main_content')

<div class="sub-nav">

    <nav>

    @foreach ($allCategories as $categoryLink)
        <a href="/recipe-category/{{ $categoryLink->id }}">
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

<?php 
$sum = ($recipe->prep_time + $recipe->cook_time);
if($sum < 60) {
    $cooking_time = $sum;
} else {
    $hour = floor($sum/60);
    $minutes = ($sum%60);
}

$imageName = RecipeImage::where('recipe_id', $recipe->id)->value('image_one_name');

?>

    <a href="/recipes/{{ $recipe->id }}">
        <div class="small-tiles">
            <img src=" {{asset('storage/app/recipeImages/'.$imageName) }}">
            <div>{{ $recipe->name }}</div>
            @if($sum < 60)
                <div>Cooking time - {{ $cooking_time }} minutes</div>
            @else
                <div>Cooking time - {{ $hour }} hours and {{ $minutes }} minutes</div>
            @endif
        </div>
    </a>

@endforeach

</div>

@endsection