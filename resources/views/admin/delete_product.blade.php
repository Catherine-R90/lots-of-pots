@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Delete Products</h3>

</div>

@if(count($products) == 0)
            
            <div class='notification'>
            
                <p>No products to delete</p>
                
            </div>
        
    @elseif(count($products)!= 0)

<form method="POST" action="/products/delete">
@csrf

    <div class="form-label">
        <label for="delete-product">Delete Product</label>
    </div>

        <div class="form-label">
            <select name="id">

                @foreach($products as $product)

                <option value="<?php echo $product->id; ?>">

                    <?php echo $product->name; ?>

                </option>

                @endforeach

            </select>
        </div>

    

    <div class="form-label">
        <input type="submit" value="Delete">
    </div>

</form>
@endif
<!-- 
<form method="POST" action="/products/images/delete">
@csrf

    <div class="form-label">
        <label for="delete-images">Delete Images</label>
    </div>

        <div class="form-label">
            <select name="imageId">

                @foreach($images as $image)

                <option value="<?php echo $image->id; ?>">

                    <?php echo $image->image_one_name; ?>

                </option>

                @endforeach

            </select>
        </div>

    

    <div class="form-label">
        <input type="submit" value="Delete">
    </div>

</form> -->

@endsection