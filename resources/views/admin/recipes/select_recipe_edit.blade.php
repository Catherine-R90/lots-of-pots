@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Select Recipe To Edit</h3>

</div>

@if(count($recipes) == 0)
            
    <div class='notification'>
    
        <p>No recipes to edit</p>
        
    </div>
    
@endif
@foreach($categories as $category)

    <h3 style="text-align: center">{{ $category->category }}</h3>

    @foreach ($recipes as $recipe) 
        @if($recipe->recipe_category == $category->id)

            <div class="form">
                <form action="/admin/recipes/edit/{{ $recipe->id }}">
                @csrf

                <div class="select-button">
                    <input type="submit" value="{{ $recipe->name }}">
                </div>

                </form>
            </div>
            
        @endif
    @endforeach
@endforeach

@endsection