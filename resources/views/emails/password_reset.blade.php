<h1>Password Reset</h1>

<p>
Hello {{ $user->first_name." ".$user->last_name }},

    <br>

    Please follow the below link and copy the following code to reset your password.

    <br>

    <h2>Reset code</h2>
    <h3>{{ $reminder->code }}</h3>

    <a href="dev.lotsofpots.co.uk/account/password/reset">Reset Password</a>

    <br>

Kind regards,
The LoP Team
</p>