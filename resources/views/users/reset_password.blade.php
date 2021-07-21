<?php
use Jenssegers\Agent\Agent;
$agent = new Agent;
?>

@extends('ui.whole_page')
@section('main_content')

@if($agent->isDesktop())
    <div class="boxed-header">
        <h3>Password Reset</h3>
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

    <form method="POST" action="/password/reset">
        @csrf

        <div class="form-label">
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        
        <div class="form-label">
            <label for="code">Reset Code</label>
            <input type="text" name="code">
        </div>   

        <div class="form-label">
            <label for="password">New Password</label>
            <input type="password" name="password">
        </div>

        <div class="form-label">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password">
        </div>

        <div class="grey-link">
            <input type="submit" value="Reset Password">
        </div>
    </form>
@endif

@if($agent->isMobile())
    <div class="mobile-header">
        <h3>Password Reset</h3>
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
        <form method="POST" action="/password/reset">
            @csrf

            <div class="mobile-form-label">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>
            
            <div class="mobile-form-label">
                <label for="code">Reset Code</label>
                <input type="text" name="code">
            </div>   

            <div class="mobile-form-label">
                <label for="password">New Password</label>
                <input type="password" name="password">
            </div>

            <div class="mobile-form-label">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password">
            </div>

            <div class="mobile-link">
                <input type="submit" value="Reset Password">
            </div>
        </form>
    </div>
@endif
@endsection