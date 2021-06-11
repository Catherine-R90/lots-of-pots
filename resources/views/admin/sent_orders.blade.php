@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">
    <h3>Sent Orders</h3>
</div>

@foreach($orders as $order)

<?php
$products = $order->products()->get();
?>        

<div class="order-box">
    <h3>Order No: {{ $order->order_number }}</h3>

    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} x {{ $product->pivot->quantity }}</li>    
        @endforeach
    </ul>

    <div class="grey-link">
        <a href="/admin/orders/{{ $order->id }}">View Order</a>
    </div>

</div>

@endforeach
@endsection