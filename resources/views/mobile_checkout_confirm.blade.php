@extends('ui.whole_page')

@section('main_content')

<div class="mobile-header">
    <h3>Thank you for your order</h3>
</div>

<div class="mobile-subheader">

    <h3>Order Summary For Order No. {{$order->order_number}}</h3>

        <div class="hr"></div>

    @foreach($products as $product)
    <?php
    $total = $product->pivot->order_price*$product->pivot->quantity;
    ?>

        <div class="group">
            <p>{{ $product->name }} x {{ $product->pivot->quantity }}</p>
            <p>£{{ number_format($total, $decimals = 2, $decimal_seperator = ".", $thousand_seperator = ",") }}</p>
        </div>

    @endforeach

</div>


@endsection