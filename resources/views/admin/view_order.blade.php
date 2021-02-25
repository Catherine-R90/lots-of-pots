@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">
    <h3>Order No: {{ $order->id }}</h3>
</div>

<div class="order-box">
    @foreach($products as $product)
    <?php
    $images = $product->images()->get();
    ?>

    <div class="order-items">
        <div class="order-text">        
            <p>Product: {{$product->name}}</p>
            <p>Quantity: {{$product->pivot->quantity}}</p>
        </div>
            @foreach($images as $image)
            <div class="img-container">
                <img src="{{ asset('storage/app/productImages/'.$image->image_one_name) }}">
            </div>
            @endforeach
    </div>
    @endforeach

    <div class="order-address">
        @foreach($address as $a)
        Delivery Address:
        <ul>
            <li>{{ $a->name }}</li>
            <li>{{ $a->first_line }}</li>
            @if($a->second_line != null)
            <li>{{ $a->second_line }}</li>
            @endif
            <li>{{ $a->city }}</li>
            <li>{{ $a->postcode }}</li>
            <li>{{ $a->phone_number }}</li>
            <li>{{ $a->email }}</li>
        </ul>
        @endforeach
    </div>

    <div class="grey-link">
    <form method="POST" action="/admin/delete-order">
        @csrf
        <input type="hidden" value="{{ $order->id }}" name="id">
        <input type="submit" value="Delete Order">
    </form> 
</div>

</div>



@endsection