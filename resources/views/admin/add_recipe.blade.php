@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Add Recipe</h3>

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


        <form method="POST" action="/recipes/add" enctype="multipart/form-data">
        @csrf

        <!-- RECIPE NAME -->
        <div class="form-label">
            <label for="recipe-name">Recipe Name</label>

            <input type="text" id="name" name="name" placeholder="Recipe Name" required>
        </div>

        <!-- PREP TIME -->
        <div class="form-label">
            <label for="prep_time">Prep Time (minutes)</label>

            <input type="number" id="prep_time" name="prep_time" required>
        </div>

        <!-- COOK TIME -->
        <div class="form-label">
            <label for="cook_time">Cook Time (minutes)</label>

            <input type="number" id="cook_time" name="cook_time" required>
        </div>  

        <!-- RECIPE INSTRUCTIONS -->
        <div class="form-label">
            <label for="instructions">Recipe Instructions (Seperate instruction steps with a colon : )</label>

            <textarea type="text" id="instructions" name="instructions" placeholder="Product Instructions" required></textarea>
        </div>

        <!-- RECIPE DESCRIPTION -->
        <div class="form-label">
            <label for="description">Recipe Description</label>

            <textarea type="text" id="description" name="description" placeholder="Recipe Description" required></textarea>
        </div>

    </div>

    <div class="section-right">
        <!-- RECIPE CATEGORY -->
        <div class="form-label">
            <label for="recipe_category">Recipe Category</label>

            <select name="recipe_category" required>

                @foreach($categories as $category)

                <option value="{{ $category->id }}">

                    {{ $category->category }}

                </option>

                @endforeach

            </select>
        </div>

        <!-- NUMBER OF INGREDIENTS -->
        <div class="form-label">
            <label>Number of ingredients</label>

            <select name="num_of_ingredients">
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

        <!-- PRODUCTS USED IN RECIPE -->
        <div class="form-label">
            <label>Products used in recipe (ctrl and click to slect multiple)</label>
            <select name="product_id[]" multiple>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- SUBMIT -->
    <div class="form-label">

        <input type="submit" value="Add Recipe Details">

    </div>
    </form>

    </div>

    

</div>

@endsection