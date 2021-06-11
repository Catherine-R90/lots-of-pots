@extends('ui.whole_page')

@section('main_content')

<!-- LEFT SIDE -->
<div class="mobile-header">
    <h3>Contact</h3>
</div>

<div class="mobile-contact">
    <div class="mobile-contact-box">
        <h3>Telephone</h3>
        <p>0000 000 000</p>
    </div>

    <div class="mobile-contact-box">
        <h3>Follow us on social media</h3>

        <div class="mobile-icon-group">
            <a href="https://www.facebook.com/">
                <img src="/images/icons/facebook-black.png">
                <p>Facebook</p>
            </a>
        </div>

        <div class="mobile-icon-group">
            <a href="https:www.twitter.com/">
                <img src="/images/icons/twitter-black.png">
                <p>Twitter</p>
            </a>
        </div>
    </div>
</div>

<div class="mobile-form">

    @if(session('message'))

    <div class="alert alert-success">

        {{ session('message') }}

    </div>

    @endif

    @if($errors->any())
        <div class="alert alert-danger">

            <ul>

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            </ul>
        </div>
    @endif

    <h3>Send us a message</h3>
    @include('/contact/mobile-contact-form')

</div>

@endsection