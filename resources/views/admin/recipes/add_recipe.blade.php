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

    {{-- NUMBER OF INGREDIENTS --}}
    <div class="form-label">
        <label for="num_of_ingredients">Number of Ingredients</label>

        <input type="number" name="num_of_ingredients">
    </div>

    <!-- IMAGE -->
    <div class="form-label">
        <label>Recipe Image</label>
        <input type="file" name="image_one" accept="image/*" required>
    </div>

    <!-- SUBMIT -->
    <div class="form-label">

        <input type="submit" value="Continue to Products">

    </div>
</form>

@endsection