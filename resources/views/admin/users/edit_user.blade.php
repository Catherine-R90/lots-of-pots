@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">
    <h3>Update Details for {{ $user->first_name." ".$user->last_name }}</h3>
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

<form method="POST" action="/admin/users/update/{{ $user->id }}">
    @csrf

    <div class="form-label">
        <label for="first_name">Update First Name</label>
        <input type="text" name="first_name" placeholder="{{ $user->first_name }}">
    </div>

    <div class="form-label">
        <label for="last_name">Update Last Name</label>
        <input type="text" name="last_name" placeholder="{{ $user->last_name }}">
    </div>

    <div class="form-label">
        <label for="email">Update Email</label>
        <input type="email" name="email" placeholder="{{ $user->email }}">
    </div>

    <div class="form-label">
        <label for="password">Update Password</label>
        <input type="password" name="password">
    </div>

    <div class="form-label">
        <label for="confirm_password">Confirm New Password</label>
        <input type="password" name="confirm_password">
    </div>

    <div class="form-label">
        <input type="submit" value="Update Details">
    </div>

</form>

@endsection