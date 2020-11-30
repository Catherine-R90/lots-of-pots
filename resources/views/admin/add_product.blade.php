@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Add Product</h3>

</div>

@if (count($errors) > 0)

<div class="alert alert-danger">

    <ul>

    @foreach ($errors->all() as $error)

    <li>{{ $error }}</li>

    @endforeach

    </ul>

</div>

@endif

<div class="form">

<form method="POST" action="/products/add" enctype="multipart/form-data">
@csrf

    <!-- PRODUCT NAME -->
    <div class="form-label">
        <label for="product-name">Product Name</label>

        <input type="text" id="name" name="name" placeholder="Product Name" required>
    </div>

    <!-- PRODUCT DESCRIPTION -->
    <div class="form-label">
        <label for="description">Product Description</label>

        <textarea type="text" id="description" name="description" placeholder="Product Description" required></textarea>
    </div>

    <!-- PRODUCT PRICE -->
    <div class="form-label">
        <label for="price">Price</label>

        <input type="number" id="price" name="price" min="0.01" max="999" step="0.01" placeholder="00.00" required>
    </div>

    <!-- PRODUCT DETAILS -->
    <div class="form-label">
        <label for="details">Product Details</label>

        <textarea type="text" id="details" name="details" placeholder="Product Details" required></textarea>
    </div>

    <!-- PRODUCT CATEGORY -->
    <div class="form-label">
        <label for="product-category">Product Category</label>

        <select name="product_category_id" required>

            <?php foreach($categories as $category) { ?>

            <option value="<?php echo $category->id; ?>">

                <?php echo $category->category; ?>

            </option>

            <?php } ?>

        </select>
    </div>

    <!-- CURRENT STOCK -->
    <div class="form-label">
        <label for="stock">Stock</label>

        <input type="number" id="stock" name="stock" min="1" step="1" placeholder="0" required>
    </div>

    <!-- FIRST IMAGE -->
    <div class="form-label">
        <label>First Image</label>
        <input type="text" name="image_one_name" id="image_one_name" placeholder="First Image Name" required>

        <input type="file" name="image_one" accept="image/*" required>
    </div>

    <!-- SECOND IMAGE -->
    <div class="form-label">
        <label>Second Image (optional)</label>
        <input type="text" name="image_two_name" id="image_two_name" placeholder="Second Image Name">

        <input type="file" accept="image/*" name="image_two">
    </div>

    <!-- THIRD IMAGE -->
    <div class="form-label">
        <label>Third Image (optional)</label>
        <input type="text" name="image_three_name" id="image_three_name" placeholder="Third Image Name">

        <input type="file" accept="image/*" name="image_three">
    </div>

    <!-- FOURTH IMAGE -->
    <div class="form-label">
        <label>Fourth Image (optional)</label>
        <input type="text" name="image_four_name" id="image_three_name" placeholder="Third Image Name">

        <input type="file" accept="image/*" name="image_four">
    </div>

    <div class="form-label">
        <input type="submit" value="Add">
    </div>

</form>

</div>

@endsection