<?php
use Jenssegers\Agent\Agent;
$agent = new Agent();
?>

@extends('ui.whole_page')

@section('main_content')

@if($agent->isDesktop())

<div class="boxed-header">
    <h3>Returns and Refunds policy</h3>
</div>

<div class="faq">

    <p>Thanks for shopping at ​Lots of Pots​.
    If you are not entirely satisfied with your purchase, we're here to help.</p>

    <h3>Returns</h3>
    <p>You have ​30 calendar days to return an item from the date you received it. 
    To be eligible for a return, your item must be unused and in the same condition that you received it.
    Your item must be in the original packaging.
    Your item needs to have the receipt or proof of purchase.</p>

    <h3>Refunds</h3>
    <p>Once we receive your item, we will inspect it and notify you that we have received your returneditem. 
    We will immediately notify you on the status of your refund after inspecting the item.
    If your return is approved, we will initiate a refund to your credit card (or original method ofpayment).
    You will receive the credit within a certain amount of days, depending on your card issuer's policies.</p>

    <h3>Shipping</h3>
    <p>You will be responsible for paying for your own shipping costs for returning your item. 
    Shipping costs are non​refundable.
    If you receive a refund, the cost of return shipping will be deducted from your refund.</p>

    <h3>Contact Us</h3>
    <p>If you have any questions on how to return your item to us, contact us</p>

</div>

@endif

@if($agent->isMobile())

<div class="mobile-header">
    <h3>Returns and Refunds policy</h3>
</div>

<div class="mobile-faq">

    <p>Thanks for shopping at ​Lots of Pots​.
    If you are not entirely satisfied with your purchase, we're here to help.</p>

    <h3>Returns</h3>
    <p>You have ​30 calendar days to return an item from the date you received it. 
    To be eligible for a return, your item must be unused and in the same condition that you received it.
    Your item must be in the original packaging.
    Your item needs to have the receipt or proof of purchase.</p>

    <h3>Refunds</h3>
    <p>Once we receive your item, we will inspect it and notify you that we have received your returneditem. 
    We will immediately notify you on the status of your refund after inspecting the item.
    If your return is approved, we will initiate a refund to your credit card (or original method ofpayment).
    You will receive the credit within a certain amount of days, depending on your card issuer's policies.</p>

    <h3>Shipping</h3>
    <p>You will be responsible for paying for your own shipping costs for returning your item. 
    Shipping costs are non​refundable.
    If you receive a refund, the cost of return shipping will be deducted from your refund.</p>

    <h3>Contact Us</h3>
    <p>If you have any questions on how to return your item to us, contact us</p>

</div>

@endif

@endsection