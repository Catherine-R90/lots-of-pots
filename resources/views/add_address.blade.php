<?php
use App\Models\Product;
?>

@extends('ui.whole_page')
@section('main_content')

<div class="boxed-header">
    <h3>Delivery</h3>
</div>

@if($errors->any())

<div class="alert alert-danger">

    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>

</div>

@endif

<form method="POST" action="/add-address">
@csrf

<div class="whole-section">

    <div class="section-left">

        <div class="checkout-section">

            <h3>Delivery Address</h3>

            <div class="checkout-label">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="checkout-label">
                <label for="first_line">Line One</label>
                <input type="text" id="first_line" name="first_line">
            </div>

            <div class="checkout-label">
                <label for="second_line">Line Two (optional)</label>
                <input type="text" id="line_two" name="second_line">
            </div>

            <div class="checkout-label">
                <label for="city">City</label>
                <input type="text" id="city" name="city">
            </div>

            <div class="checkout-label">
                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode">
            </div>

            <div class="checkout-label">
                <label for="phone_number">Phone Number</label>
                <input type="tel" placeholder="0000 000 000" id="phone_number" name="phone_number">
            </div>

            <div class="checkout-label">
                <label for="email_address">Email Address</label>
                <input type="email" id="email" name="email">
            </div>

        </div>        
    </div>

    <div class="section-right">

        <div class="checkout-section">


            <h3>Order Summary</h3>
            @foreach($cart as $item)
            <?php $products = Product::where('id', $item->product_id)->get(); 
            ?>

            <input type="hidden" name="cart_id[]" value="{{ $item->id }}">

            @foreach($products as $product)
            <?php 
                $price = $product->price * $item->quantity; 
            ?>

            <p>{{$product->name}} x {{$item->quantity}}</p>
            <b>£{{ number_format($price, $decimals =2, $decimal_seperator = ".", $thousand_seperator = "," )}}</b>

                <hr>

            <?php $sum[] = $item->price * $item->quantity; 
            if($item->delivery_option == 1) {
                $del_option = 0;
            }
            if($item->delivery_option == 2) {
                $del_option = 5;
            }
            if($item->delivery_option == 3) {
                $del_option = 10;
            } ?>
            @endforeach
            @endforeach

            <p>Postage</p>
            <b>£{{ number_format($del_option, $decimals = 2, $decimal_seperator = ".", $thousand_seperator = ",") }}</b>

                <hr>

            <?php 
            $total = array_sum($sum) + $del_option; ?>

            <b>Total to pay: £{{ number_format($total, $decimals = 2, $decimal_seperator =".", $thousand_seperator = ",") }}</b>

        </div>

        <div class="confirm">
            <input type="submit" value="Continue to payment">
        </div>

        </form>

    </div>

</div>
@endsection