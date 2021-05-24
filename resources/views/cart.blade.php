<?php
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Cart;
?>

@extends('ui.whole_page')

@section('main_content')

<x-delivery_banner/>

@if(count($cartItems) == 0)

    <div class="boxed-header">
        <h3>Your cart is empty</h3>
    </div>

@else

<div class="whole-cart">

    <div class="cart-left">

            <h3>Products in your cart</h3>

            @foreach ($cartItems as $item)

            <?php
            $products = Product::where('id', $item->product_id)->get();
            ?>

            <div class="items-cart">
                <div class="item-image-group">
                    @foreach($products as $product)

                    <?php $image = ProductImage::where('product_id', $product->id)->value('image_one_name'); ?>

                    <img src="{{ asset('storage/app/'.$image) }}">

                    <div class="details-quant">
                        
                        <p>{{ $product->name }}</p>
                        <p>£{{ $item->price }}</p>
                        
                        <form method="POST" action="/cart/product/adjust">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="id">

                            <p>Current quantity: {{$item->quantity}}</p>
                            
                            <div class="form-label">
                                <label>Quantity</label>
                                <input type="number" name="quantity">
                
                                <div class="grey-link">
                                    <input type="submit" value="Update Cart">
                                </div>
                            </div>

                        </form>
                    </div>
                    @endforeach
                </div>

                <form method="POST" action="/cart/product/remove">
                    @csrf
                    <input type="hidden" value="{{ $item->id }}" name="id">

                    <div class="grey-link">
                        <input type="submit" value="Remove item from cart">
                    </div>

                </form>
            </div>
            @endforeach

            <div class="grey-link">
                <form method="POST" action="/cart/clear">
                    @csrf

                    @foreach($cartItems as $item)

                    <input type="hidden" value="{{ $item->id }}" name="id">

                    @endforeach

                    <input type="submit" value="Clear cart">
                </form>
            </div>

    </div>

    <div class="cart-right">

        <div class="sub-total">

            <?php 
            foreach ($cartItems as $item) {
                $sum[] = $item->price * $item->quantity;
            } 
            $total = array_sum($sum);
            $remaining = 50-$total;
            ?>

            <h3>Current Subtotal: £{{ number_format($total, $decimals = 2, $decimal_seperator =".", $thousand_seperator = ",") }}</h3>

            @if($total < 50)

            <div class="hr"></div>

            <p>Spend another <b>£{{ number_format($remaining, $decimals = 2, $decimal_seperator=".", $thousand_seperator = ",") }}</b> to recieve free shipping!</p>

            <div class="grey-link">
                <form method="GET" action="/">
                    @csrf

                    <input type="submit" value="Continue shopping">
                </form>
            </div>

            @endif

        </div>

        <div class="sub-total">

            <h3>Delivery Options</h3>

                <form method="POST" action ="/cart/delivery">
                @csrf

                @if($total > 50)

                    <div class="del-options">
                        <label for="free-delivery">Free Delivery for orders over £50</label>
                        <input type="radio" name="del_opt" value=1 id="free-delivery">
                        <b>Free</b>
                        <p>Estimated Delivery: 3-5 working days</p>
                    </div>

                @endif

                    <div class="del-options">
                        <label for="del_opt_one">Delivery Option One</label>
                        <input type="radio" name="del_opt" value=2 id="del_opt_one">
                        <b>£5.00</b>
                        <p>Estimated Delivery: 3-5 working days</p>
                    </div>

                    <div class="del-options">
                        <label for="del_opt_two">Delivery Option Two</label>
                        <input type="radio" name="del_opt" value=3 id="del_opt_two">
                        <b>£10.00</b>
                        <p>Estimated Delivery: Next working day</p>
                    </div>

                    <div class="grey-link">
                        <input type="submit" value="Add Delivery">
                    </div>
                </form>

        </div>

        <div class="sub-total">
            <div class="total">

                @foreach($cartItems as $item)
                    <?php
                    $name = Product::where('id', $item->product_id)->value('name');
                    ?>
                        <p>{{$name}} x {{$item->quantity}}</p>
                        <b>£{{$item->price * $item->quantity}}</b>
                @endforeach

                <h3>Subtotal<h3>
                <h3>£{{ number_format($total, $decimals = 2, $decimal_seperator = ".", $thousand_seperator = ",") }}</h3>
            </div>

            <div class="hr"></div>

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

            @if($total < 50 && $del_option == 0)
                <b>You no longer qualify for free shipping. Either choose a new delivery option or increase your order to £50 to recieve free shipping.</b>            
            @else
            <div class="total">
                <h3>Delivery</h3>
                <h3>£{{ number_format($del_option, $decimals = 2, $decimal_seperator = ".", $thousand_seperator = ",") }}</h3>
            </div>
            @endif

            <div class="hr"></div>

            <div class="total">
                <h2>Total<h2>
                <h2>£{{ number_format($finalTotal, $decimals = 2, $decimal_seperator = ".", $thousand_seperator = ",") }}</h2>
            </div>

        </div>
        
        <div class="grey-link">
            <form method="GET" action="/address/add">
                @csrf
                <input type="submit" value="Continue to delivery">
            </form>
        </div>
        @endif

    </div>

</div>

@endif

@endsection