@extends('ui.whole_page')

@section('main_content')

<!-- LEFT SIDE -->
<div class="boxed-header">
    <h3>Contact</h3>
</div>

<div class="whole-section">
    <div class="section-left">

        <div class="contact-box">
            <h3>Telephone</h3>
            <p>0000 000 000</p>
        </div>

        <div class="contact-box">

                <h3 class="contact-box">Follow us on social media</h3>

                <div class="icon-col">
                    <div class="icon-group">
                        <a href="https://www.facebook.com/">
                            <img src="/images/icons/facebook-black.png">
                        </a>
                        <a href="https://www.facebook.com/">
                            <p>Facebook</p>
                        </a>
                    </div>

                    <div class="icon-group">
                        <a href="https:www.twitter.com/">
                            <img src="/images/icons/twitter-black.png">
                        </a>
                        <a href="https:www.twitter.com/">
                            <p>Twitter</p>
                        </a>
                    </div>
                </div>

        </div>      
    </div>

    <!-- CONTACT FORM -->
    <div class="section-right">

        <div class="contact-box">
            <h3>Send us a message</h3>

            <div class="container">

    <div class="row">

        <div class="column">

            @if(session('message'))

            <div class="alert alert-success">

                {{ session('message') }}

            </div>

            @endif

            @if($errors->any())
                <div class="alert">

                    <ul>

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                    </ul>
                </div>
            @endif

            <div class="contact-form">
                @include('/contact/contact-form')
            </div>
        </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection