@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Manage Product Categories</h3>

</div>

    <!-- ADD CATEFORY -->
<div class="form">
    <form method="POST" action="/products/category/add">
    @csrf

        <!-- CATEGORY NAME -->
        <div class="form-label">
            <label for="product_category">Add Product Category</label>

            <input type="text" id="product_category" name="product_category" placeholder="Product Category Name">
        </div>

        <div class="form-label">
            <input type="submit" value="Add">
        </div>

    </form>
</div>

    <!-- EDIT CATEGORY -->
<div class="form">
    <form method="POST" action="/products/category/edit">
    @csrf

        <div class="form-label">
            <label for="edit-category">Edit Product Category</label>

            <label for="id">Current Product Category Name</label>
            <select name="id">

                <?php foreach($allCategories as $category) { ?>

                    <option value="<?php echo $category->id; ?>">

                        <?php echo $category->category; ?>

                    </option>

                    <?php } ?>

            </select>
        </div>

        <div class="form-label">
            <label for="category-name">New Product Category Name</label>
            <input type="text" id="category" name="category" placeholder="New Name">
        </div>

        <div class="form-label">
            <input type="submit" value="Update">
        </div>

    </form>
</div>

    <!-- DELETE CATEGORY -->
<div class="form">
    <form method="POST" action="/products/category/delete">
    @csrf

        <div class="form-label">

            <label for="delete_product_category">Delete Product Category</label>

            <?php if(count($categoriesNotInUse) == 0) {

                echo "All categories are in use and cannot be deleted.";
            
            } else { ?>

                <select name="id">

                    <?php foreach($categoriesNotInUse as $category) { ?>

                        <option value="<?php echo $category->id; ?>">

                            <?php echo $category->category; ?>

                        </option>

                        <?php } ?>

                </select>

            <input type="submit" value="Delete"> 

                    <?php } ?>

        </div>

    </form>

</div>

@endsection