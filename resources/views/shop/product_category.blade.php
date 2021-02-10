<?php 
use App\Models\ProductImages;
use Illuminate\Support\Facades\DB;
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

@foreach($products as $product)

<div class="tile-groups">
    
    <!-- PRODUCT IMAGES -->
    <?php
    $images = DB::table('product_images')->where('product_id', $product->id)->get();
    foreach ($images as $image) {
        $imageName = $image->image_one_name;
    }
    ?>

        <a href="/products/{{ $product->id }}">
            <div class="small-tiles">
                <img src="{{ asset('storage/app/productImages/'.$imageName) }}">
                {{ $product->name}} - £{{ $product->price }}
            </div>
        </a>

</div>
@endforeach

@endsection