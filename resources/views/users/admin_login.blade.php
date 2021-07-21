@extends('ui.whole_page')
@section('main_content')

<div class="boxed-header">
    <h3>Admin Log In</h3>
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

<form method="POST" action="/login">
@csrf

    <div class="form-label">
        <label for="email_address">Email Address</label>
        <input type="email" name="email_address">
    </div>

    <div class="form-label">
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>

    <div class="grey-link">
        <input type="submit" value="Log In">
    </div>

</form>

<div class="grey-link">
    <a href="/password-reset">Forgotten your password?</a>
</div>

    <hr>

<div class="grey-link">
    <a href="/admin/register">Register</a>
</div>

@endsection