@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">
    <h3>Manage Orders</h3>
</div>

<div class="boxed-link">
    <a href="/admin/orders/incomplete">View New Orders</a>
</div>

<div class="boxed-link">
    <a href="/admin/orders/picked">View Orders Being Picked</a>
</div>

<div class="boxed-link">
    <a href="/admin/orders/sent">View Orders That Have Been Sent</a>
</div>

<div class="boxed-link">
    <a href="/admin/orders/complete">View Completed Orders</a>
</div>


@endsection