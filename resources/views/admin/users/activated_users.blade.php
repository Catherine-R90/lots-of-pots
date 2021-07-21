@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">
    <h3>Activated Staff Accounts</h3>
</div>

@foreach($users as $user)

    @if(userHelper::activated($user) == true)
        <div class="form-label">
            <p>{{ $user->first_name." ".$user->last_name }}</p>

            <form method="POST" action="/admin/users/delete/{{ $user->id}}">
                @csrf

                <input  type="submit" value="Delete User">
            </form>
        </div>
    @endif

@endforeach

@endsection