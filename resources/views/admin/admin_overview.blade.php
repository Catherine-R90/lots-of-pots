@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>
    
<div class="boxed-header">

    <h3>Admin Home</h3>

</div>

<div class="boxed-link">

    <a href="/admin/orders/overview">View and Manage Orders</a>

</div>

<div class="boxed-link">

    <a href="/admin/products/overview">Manage Products</a>

</div>

<div class="boxed-link">

    <a href="/admin/products/categories/edit">Manage Product Categories</a>

</div>

<div class="boxed-link">

    <a href="/admin/recipes/overview">Manage Recipes</a>

</div>

<div class="boxed-link">

    <a href="/admin/recipes/categories/edit">Manage Recipe Categories</a>

</div>

@endsection