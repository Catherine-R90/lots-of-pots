@extends('ui.whole_page')
@section('main_content')

<div class="boxed-header">
    <h3>Admin Register</h3>
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

<form method="POST" action="/admin/register">
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
        <input type="submit" value="Register Admin Account">
    </div>
</form>

@endsection