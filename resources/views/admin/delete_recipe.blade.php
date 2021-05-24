@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Delete Recipes</h3>

</div>

@if(count($recipes) == 0)
            
            <div class='notification'>
            
                <p>No recipes to delete</p>
                
            </div>
        
    @elseif(count($recipes)!= 0)

<form method="POST" action="/recipes/delete">
@csrf

    <div class="form-label">
        <label for="delete-recipe">Delete Recipe</label>
    </div>

        <div class="form-label">
            <select name="id">

                @foreach($recipes as $recipe)

                <option value="<?php echo $recipe->id; ?>">

                    <?php echo $recipe->name; ?>

                </option>

                @endforeach

            </select>
        </div>

    

    <div class="form-label">
        <input type="submit" value="Delete">
    </div>

</form>
@endif

@endsection