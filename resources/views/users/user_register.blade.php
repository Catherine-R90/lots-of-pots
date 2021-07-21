@extends('ui.whole_page')
@section('main_content')


@if($agent->isDesktop())

    @if($errors->any())
    <div class="alert">

        <ul>

        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach

        </ul>
    </div>
    @endif

    <div class="boxed-header">
        <h3>Register</h3>
    </div>

    <form method="POST" action="/register">
        @csrf

        <div class="form-label">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name">
        </div>

        <div class="form-label">
            <label for="second_name">Second Name</label>
            <input type="text" name="second_name">
        </div>

        <div class="form-label">
            <label for="email_address">Email Address</label>
            <input type="email" name="email_address">
        </div>

        <div class="form-label">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>


        <div class="form-label">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password">
        </div>

        <div class="grey-link"> 
            <input type="submit" value="Register Account">
        </div>
    </form>

@endif

@if($agent->isMobile())

    <div class="mobile-header">
        <h3>Register</h3>
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

    <form class="mobile-form" method="POST" action="/register">
        @csrf

        <div class="form-label">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name">
        </div>

        <div class="form-label">
            <label for="second_name">Second Name</label>
            <input type="text" name="second_name">
        </div>

        <div class="form-label">
            <label for="email_address">Email Address</label>
            <input type="email" name="email_address">
        </div>

        <div class="form-label">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>


        <div class="form-label">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password">
        </div>

        <div class="mobile-link"> 
            <input type="submit" value="Register Account">
        </div>
    </form>
@endif

@endsection