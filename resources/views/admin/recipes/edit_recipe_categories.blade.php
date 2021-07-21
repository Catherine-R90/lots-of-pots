@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Manage Recipe Categories</h3>

</div>

    <!-- ADD CATEFORY -->
<div class="form">

    <form method="POST" action="/recipe/category/add">
    @csrf

        <div class="form-label">
            <label for="recipe-category">Add Recipe Category</label>

            <input type="text" id="recipe-category" name="recipe-category" placeholder="Recipe Category Name">
        </div>

        <div class="form-label">
            <input type="submit" value="Add">
        </div>

    </form>
</div>

    <!-- EDIT CATEGORY -->
<div class="form">

    <form method="POST" action="/recipes/category/edit">
    @csrf

        <div class="form-label">
            <label for="edit-category">Edit Recipe Category</label>

            <label for="id">Current Product Recipe Name</label>
            <select name="id">

                <?php foreach($allCategories as $category) { ?>

                    <option value="<?php echo $category->id; ?>">

                        <?php echo $category->category; ?>

                    </option>

                    <?php } ?>

            </select>
        </div>

        <div class="form-label">
            <label for="category-name">New Recipe Category Name</label>
            <input type="text" id="category" name="category" placeholder="New Name">
        </div>

        <div class="form-label">
            <input type="submit" value="Update">
        </div>

    </form>
</div>

    <!-- DELETE CATEGORY -->
<div class="form">

    <form method="POST" action="/recipes/category/delete">
    @csrf

        <div class="form-label">

            <label for="delete-recipe-category">Delete Recipe Category</label>

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