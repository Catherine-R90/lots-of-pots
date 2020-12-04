@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Edit Recipe: {{ $recipe->name }}</h3>

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

<div class="whole-section">

    <div class="section-left">

    <form method="POST" action="/recipes/edit" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">

        <!-- RECIPE NAME -->
        <div class="form-label">
            <label for="name">Change Recipe Name</label>

            <input type="text" id="name" name="name" placeholder="{{ $recipe->name }}">
        </div>

        <!-- PREP TIME -->
        <div class="form-label">
            <label for="prep_time">Change Prep Time (minutes)</label>

            <input type="number" id="prep_time" name="prep_time" placeholder="{{ $recipe->prep_time }}">
        </div>

        <!-- COOK TIME -->
        <div class="form-label">
            <label for="cook_time">Change Cook Time (minutes)</label>

            <input type="number" id="cook_time" name="cook_time" placeholder="{{ $recipe->cook_time }}">
        </div>  

        <!-- RECIPE INSTRUCTIONS -->
        <div class="form-label">
            <label for="instructions">Change Recipe Instructions (Seperate instruction steps with a colon : )</label>

            <textarea type="text" id="instructions" name="instructions" placeholder="{{ $recipe->instructions }}"></textarea>
        </div>

        <!-- RECIPE DESCRIPTION -->
        <div class="form-label">
            <label for="description">Change Recipe Description</label>

            <textarea type="text" id="description" name="description" placeholder="{{ $recipe->description }}"></textarea>
        </div>

    </div>

    <div class="section-right">
        <!-- PRODUCT CATEGORY -->
        <div class="form-label">
            <label for="recipe_category">Change Recipe Category</label>

            <select name="recipe_category">
                <option value="">Don't change</option>

                @foreach($categories as $category)

                <option value="{{ $category->id }}">

                    {{ $category->category }}

                </option>

                @endforeach

            </select>
        </div>

        <!-- FIRST IMAGE -->
        <div class="form-label">
            <label>Change First Image</label>
            <input type="text" name="image_one_name" id="image_one_name" placeholder="First Image Name">

            <input type="file" name="image_one" accept="image/*">
        </div>

        <!-- SECOND IMAGE -->
        <div class="form-label">
            <label>Change or Add Second Image (optional)</label>
            <input type="text" name="image_two_name" id="image_two_name" placeholder="Second Image Name">

            <input type="file" accept="image/*" name="image_two">
        </div>

        <!-- THIRD IMAGE -->
        <div class="form-label">
            <label>Change or Add Third Image (optional)</label>
            <input type="text" name="image_three_name" id="image_three_name" placeholder="Third Image Name">

            <input type="file" accept="image/*" name="image_three">
        </div>

        <!-- PRODUCTS USED IN RECIPE -->
        <div class="form-label">
            <label>Change or add products used in recipe</label>
            <select name="product_id[]" multiple>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- INGREDIENTS -->
        <div class="form-label">
            <label>Change Number of Ingredients</label>
        
                <select name="num_of_ingredients">
                    <option value="">Don't change</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                </select>

        </div>

        <!-- SUBMIT -->
        <div class="form-label">
            <input type="submit" value="Update Recipe">
        </div>
        </form>

    </div>
</div>


@endsection