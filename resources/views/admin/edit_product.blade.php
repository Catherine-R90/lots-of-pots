@extends ('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Edit Product: {{ $product->name }}</h3>

</div>

<div class="form">

    <form method="POST" action="/products/edit" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">

        <!-- PRODUCT NAME -->
        <div class="form-label">
            <label>Product Name</label>

            <input type="text" name="name" id="name" placeholder="{{ $product->name }}">
        </div>

        <!-- PRODUCT DESCRIPTION -->
        <div class="form-label">
            <label>Product Description</label>

            <textarea type="text" name="description" id="description" placeholder="{{ $product->description }}"></textarea> 
        </div>

        <!-- PRICE -->
        <div class="form-label">
            <label>Price</price>

            <input type="number" id="price" name="price" placeholder="{{ $product->price }}">
        </div>

        <!-- PRODUCT DETAILS -->
        <div class="form-label">
            <label>Product Details (seperate details with a semi-colon ; )</label>

            <textarea name="details" id="details" placeholder="{{ $product->details }}"></textarea>
        </div>

        <!-- PRODUCT CATEGORY -->
        <div class="form-label">
            <label>Product Category</label>

            <select name="product_category_id" id="product_category_id">
                <option value="">Don't change</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>

        @foreach($images as $image)
        <!-- FIRST IMAGE -->
        <div class="form-label">
            <label>First Image</label>
            <label>Current Image</label>
            <img src="{{ asset('storage/app/'.$image->image_one_name) }}">

            <input type="file" name="image_one" id="image_one" accept="image/*">
        </div>

        <!-- SECOND IMAGE -->
        <div class="form-label">
            <label>Second Image</label>
            @if($image->image_two_name != null)
                <label>Current Image</label>
                <img src="{{ asset('storage/app/'.$image->image_two_name) }}">
            @endif

            <input type="file" name="image_two" id="image_two" accept="image/*">
        </div>

        <!-- THIRD IMAGE -->
        <div class="form-label">
            <label>Third Image</label>
            @if($image->image_three_name != null)
                <label>Current Image</label>
                <img src="{{ asset('storage/app/'.$image->image_three_name) }}">
            @endif

            <input type="file" name="image_three" id="image_three">

        </div>

        <!-- FOURTH IMAGE -->
        <div class="form-label">
            <label>Fourth Image</label>
            @if($image->image_four_name != null)
                <label>Current Image</label>
                <img src="{{ asset('storage/app/'.$image->image_four_name) }}">
            @endif
            
            <input type="file" name="image_four" id="image_four" accept="image/*">

        </div>
        @endforeach

        <div class="form-label">
            <input type="submit" value="Update">
        </div>
    </form>

</div>

@endsection