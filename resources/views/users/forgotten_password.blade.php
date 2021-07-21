<?php
use Jenssegers\Agent\Agent;
$agent = new Agent;
?>

@extends('ui.whole_page')
@section('main_content')

@if($agent->isDesktop())
    <div class="boxed-header">
        <h3>Forgotten Password</h3>
    </div>

    @if($errors->any())
        <div class="alert">

            <ul>

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            </ul>
        </div>
    @endif

    <div class="mobile-form">
        <form method="POST" action="/account/reset">
            @csrf

            <div class="mobile-form-label">
                <label for="email">Email address for account</label>
                <input type="email" name="email">
            </div>

            <div class="mobile-link">
                <input type="submit" value="Send password reset link">
            </div>

        </form>
    </div>
@endif

@if($agent->isMobile())
    <div class="mobile-header">
        <h3>Forgotten Password</h3>
    </div>

    @if($errors->any())
        <div class="mobile-alert">

            <ul>

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            </ul>
        </div>
    @endif

    <div class="mobile-form">
        <form method="POST" action="/account/reset">
            @csrf

            <div class="mobile-form-label">
                <label for="email">Email address for account</label>
                <input type="email" name="email">
            </div>

            <div class="mobile-link">
                <input type="submit" value="Send password reset link">
            </div>

        </form>
@endif

@endsection