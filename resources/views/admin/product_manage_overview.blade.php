@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>
    
<div class="boxed-header">

    <h3>Manage Products</h3>

</div>

<div class="boxed-link">

    <a href="/admin/products/add">Add New Product</a>

</div>

<div class="boxed-link">

    <a href="/admin/products/edit/overview">Edit Existing Products</a>

</div>

<div class="boxed-link">

    <a href="/admin/products/delete">Delete Products</a>

</div>

@endsection