@extends('ui.whole_page')
@section('main_content')


@if($agent->isDesktop())
    <div class="boxed-header">
        <h3>Log In</h3>
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

        <input type="hidden" name="url" value="{{ $url }}">
        
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
        <a href="/register">Register</a>
    </div>
@endif

@if($agent->isMobile())
    <div class="mobile-header">
        <h3>Log In</h3>
    </div>

    <form class="mobile-form" method="POST" action="/login">
    @csrf

        <input type="hidden" name="url" value="{{ $url }}">
        
        <div class="mobile-form-label">
            <label for="email_address">Email Address</label>
            <input type="email" name="email_address">
        </div>

        <div class="mobile-form-label">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>

        <div class="mobile-link">
            <input type="submit" value="Log In">
        </div>

    </form>

    <div class="mobile-link">
        <a href="/password-reset">Forgotten your password?</a>
    </div>

    <div class="mobile-link">
        <a href="/register">Register</a>
    </div>
@endif

@endsection