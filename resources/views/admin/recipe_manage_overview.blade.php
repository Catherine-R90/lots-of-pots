@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>
    
<div class="boxed-header">

    <h3>Manage Recipes</h3>

</div>

<div class="boxed-link">

    <a href="/admin/recipes/add">Add New Recipe</a>

</div>

<div class="boxed-link">

    <a href="/admin/recipes/edit">Edit Existing Recipe</a>

</div>

<div class="boxed-link">

    <a href="/admin/recipes/delete">Delete Recipes</a>

</div>

@endsection