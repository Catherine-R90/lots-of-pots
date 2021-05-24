@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">
    <h3>Manage Orders</h3>
</div>

<<<<<<< HEAD
<div class="boxed-link">
    <a href="/admin/orders/incomplete">View Incomplete Orders</a>
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

=======
<div class="boxed-header">
    <h3>Incomplete Orders</h3>
</div>

@foreach($orders as $order)

<?php
$products = $order->products()->get();
?>

@if($order->order_status == 1) 

<div class="order-box">
    <h3>Order No: {{ $order->id }}</h3>

    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} x {{ $product->pivot->quantity }}</li>    
        @endforeach
    </ul>

    <div class="grey-link">
        <a href="/admin/orders/{{ $order->id }}">View Order</a>
    </div>

</div>

@endif

@endforeach

<div class="boxed-header">
    <h3>Completed Orders</h3>
</div>

@foreach($orders as $order)
@if($order->order_status == 2)

<div class="order-box">
    <h3>Order No: {{ $order->id }}</h3>

    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} x {{ $product->pivot->quantity }}</li>    
        @endforeach
    </ul>

    <div class="grey-link">
        <a href="/admin/orders/{{ $order->id }}">View Order</a>
    </div>

    <div class="grey-link">
        <form method="/admin/delete-order/{{ $order->id }}">
            @csrf
            <input type="submit" value="Delete Order">
        </form>
    </div>
</div>

@endif
@endforeach
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9

@endsection