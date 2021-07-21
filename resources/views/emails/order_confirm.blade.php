<h1>Order Confirmation</h1>

<p>
Hello {{ $deliveryAddress->name }},

<br>

Details of Order No. {{ $order->order_number }}:

<br>
@foreach($order->products()->get() as $product)

    {{ $product->name }} x {{ $product->pivot->quantity }}
        <br>
    £{{ $product->price }}
    <br>
@endforeach

To be sent to:
    <br>
{{ $deliveryAddress->first_line }}
    <br>
@if($deliveryAddress->second_line != null)
{{ $deliveryAddress->second_line }}
    <br>
@endif
    
{{ $deliveryAddress->city }}
    <br>
{{ $deliveryAddress->postcode }}
    <br>
Many thanks for your order!

<br>

Kind regards,
    <br>
The LoP Team