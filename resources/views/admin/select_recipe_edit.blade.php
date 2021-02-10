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

@foreach ($recipes as $recipe) 
<div class="form">
    <form action="/admin/recipes/edit/{{ $recipe->id }}">
    @csrf

    <div class="select-button">
        <input type="submit" value="{{ $recipe->name }}">
    </div>

    </form>
</div>
@endforeach

@endsection