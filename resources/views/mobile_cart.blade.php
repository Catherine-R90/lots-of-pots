<?php
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Cart;
?>

@extends('ui.whole_page')

@section('main_content')

<div class="mobile-banner">
    <img src="/images/mobile_banner.png">
</div>

@if(count($cartItems) == 0)

    <div class="mobile-subheader">
        <h3>Your cart is empty</h3>
    </div>

@else

    <div class="mobile-cart">

        <div class="mobile-header">
            <h3>Items in your cart</h3>
        </div>

        @foreach($cartItems as $item)

            <?php
            $products = Product::where('id', $item->product_id)->get();
            ?>

            <div class="mobile-cart-item">

                @foreach($products as $product)

                    <?php $image = ProductImage::where('product_id', $product->id)->value('image_one_name'); ?>

                    <img src="{{ asset('storage/app/'.$image) }}">

                    <p><b>{{ $product->name }}</b></p>
                    <p class="mobile-price">£{{ $item->price }}</p>

                    <form class="mobile-form" method="POST" action="/cart/product/adjust">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">

                        <p>Current quantity: <b>{{$item->quantity}}</b></p>
                        
                        <div class="form-label">
                            <label>Change Quantity</label>
                            <input type="number" name="quantity">
            
                            <input type="submit" value="Update Cart">
                        </div>

                    </form>

                    <form class="mobile-form" method="POST" action="/cart/product/remove">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
    
                        <input type="submit" value="Remove item from cart">
    
                    </form>

                @endforeach

            </div>

        @endforeach

        <form class="mobile-form" method="POST" action="/cart/clear">
            @csrf

            @foreach($cartItems as $item)

            <input type="hidden" value="{{ $item->id }}" name="id">

            @endforeach

            <input type="submit" value="Clear cart">
        </form>

        <?php 
        foreach ($cartItems as $item) {
            $sum[] = $item->price * $item->quantity;
        } 
        $total = array_sum($sum);
        $remaining = 50-$total;
        ?>

        <div class="mobile-subheader">
            <h3>Current Subtotal: £{{ number_format($total, $decimals = 2, $decimal_seperator =".", $thousand_seperator = ",") }}</h3>

            @if($total < 50)

                <p>Spend another <b>£{{ number_format($remaining, $decimals = 2, $decimal_seperator=".", $thousand_seperator = ",") }}</b> to recieve free shipping!</p>
            
                <form method="GET" action="/">
                    @csrf

                    <input type="submit" value="Continue shopping">
                </form>

            @endif
        </div>

        <div class="mobile-subheader">
            <h3>Delivery Options</h3>

            <form class="mobile-form" method="POST" action ="/cart/delivery">
                @csrf

                @if($total > 50)

                    <label for="free-delivery">Free Delivery for orders over £50</label>
                        <br>
                    <b>Free</b>
                    <input type="radio" name="del_opt" value=1 id="free-delivery">
                    <p>Estimated Delivery: 3-5 working days</p>
                    
                @endif

                    <div class="mobile-del-options">
                        

                        <label for="del_opt_one">Delivery Option One</label>

                            <br>
                        
                        <div class="radio-container">
                            <b>£5.00</b>
                            <input type="radio" name="del_opt" value=2 id="del_opt_one">
                            <span class="custom-radio">

                            </span>
                        </div>

                        <p>Estimated Delivery: 3-5 working days</p>

                    </div>

                    <div class="mobile-del-options">
                        <label for="del_opt_two">Delivery Option Two</label>
                            <br>
                        <b>£10.00</b>
                        <input type="radio" name="del_opt" value=3 id="del_opt_two">
                        <p>Estimated Delivery: Next working day</p>
                    </div>
                    
                    <input type="submit" value="Add Delivery">
                </form>
        </div>

        @if($item->delivery_option != null)
        <?php
        foreach($cartItems as $item) {
            if($item->delivery_option == 1) {
                $del_option = 0;
            }
            if($item->delivery_option == 2) {
                $del_option = 5;
            }
            if($item->delivery_option == 3) {
                $del_option = 10;
            }
            $finalTotal = $total + $del_option; 
        } ?>
        
        <div class="mobile-subheader">
            @foreach($cartItems as $item)
                <?php
                $name = Product::where('id', $item->product_id)->value('name');
                ?>
                <p>{{$name}} x {{$item->quantity}}</p>
                <b>£{{$item->price * $item->quantity}}</b>
            @endforeach

            <h3>Subtotal</h3>

            <p>£{{ number_format($total, $decimals = 2, $decimal_seperator = ".", $thousand_seperator = ",") }}</p>

            @if($total < 50 && $del_option == 0)
                <b>You no longer qualify for free shipping. Either choose a new delivery option or increase your order to £50 to recieve free shipping.</b>            
            @else
            <div class="total">
                <h3>Delivery</h3>
                <p>£{{ number_format($del_option, $decimals = 2, $decimal_seperator = ".", $thousand_seperator = ",") }}</p>
            </div>
            @endif

                <hr>

            <div class="total">
                <h2>Total<h2>
                <h2>£{{ number_format($finalTotal, $decimals = 2, $decimal_seperator = ".", $thousand_seperator = ",") }}</h2>
            </div>

            <form class="mobile-form" method="GET" action="/address/add">
                @csrf
                <input type="submit" value="Continue to delivery">
            </form>

            @endif
        </div>

    </div>

@endif

@endsection