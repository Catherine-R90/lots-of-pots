<?php 
use App\Models\RecipeImage;
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

<div class="tile-groups-mobile">

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
    
        <div class="tile-mobile">

            <a href="/recipes/{{ $recipe->id }}">

                <img src="{{asset('storage/app/recipeImages/'.$imageName) }}">
                
                <h3>{{$recipe->name}}</h3>
                
                @if($sum < 60)
                    <p>Cooking time - {{ $cooking_time }} minutes</p>
                @else
                    <p>Cooking time - {{ $hour }} hours and {{ $minutes }} minutes</p>
                @endif

            </a>

        </div>
    
@endforeach
</div>

@endsection