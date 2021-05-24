@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">
<<<<<<< HEAD
    <h3>Order No: {{ $order->order_number }}</h3>
=======
    <h3>Order No: {{ $order->id }}</h3>
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9
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
<<<<<<< HEAD
        </ul>
        Contact Details:
        <ul>
=======
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9
            <li>{{ $a->phone_number }}</li>
            <li>{{ $a->email }}</li>
        </ul>
        @endforeach
    </div>

    <div class="grey-link">
<<<<<<< HEAD
        <form method="POST" action="/orders/flag/{{$order->id}}">
            @csrf

            <div class="form-label">
                <select name="status">
                    <option value="2">
                        Order is being picked
                    </option>

                    <option value="3">
                        Order has been sent
                    </option>

                    <option value="4">
                        Order is complete
                    </option>
                </select>
            </div>

            <input type="submit" value="Change order status">
        </form>
    </div>

    <div class="grey-link">
        <form method="POST" action="/admin/delete-order/{{$order->id}}">
            @csrf
            <input type="submit" value="Delete Order">
        </form> 
    </div>
=======
    <form method="POST" action="/admin/delete-order">
        @csrf
        <input type="hidden" value="{{ $order->id }}" name="id">
        <input type="submit" value="Delete Order">
    </form> 
</div>
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9

</div>



@endsection