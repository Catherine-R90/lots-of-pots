@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">
    <h3>Admin Users</h3>
</div>

<div class="boxed-link">
    <a href="/admin/users/activated">Activated Users</a>
</div>

<div class="boxed-link">
    <a href="/admin/users/none-activated">None Activated Users</a>
</div>

<div class="boxed-link">
    <a href="/admin/users/edit/{{ $user->id }}">Manage Your Account Details</a>
</div>
@endsection