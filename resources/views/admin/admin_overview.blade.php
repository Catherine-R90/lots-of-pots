<?php
use Jenssegers\Agent\Agent;
$agent = new Agent;
?>

@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

@if($agent->isMobile())
    <div class="mobile-alert">
        <h1 style="font-size: 50px">Admin accounts are not recommended on mobile. Please login on your desktop.</h1>
    </div>
@endif
    
<div class="boxed-header">

    <h3>Admin Home - Welcome {{ $user->first_name }}</h3>

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

<div class="boxed-link">
    <a href="/admin/users">Manage Staff Accounts</a>
</div>

<form method="POST" action="/logout">
    @csrf

    <div class="grey-link">
        <input type="submit" value="Logout">
    </div>
</form>

@endsection