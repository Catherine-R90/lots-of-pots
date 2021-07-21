@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">
    <h3>Staff Awaiting Activation</h3>
</div>

@foreach($users as $user)
    @if(userHelper::notActivated($user) == true)
        <div class="boxed-link">
            <p>{{ $user->first_name." ".$user->last_name }}</p>
            <form method="POST" action ="/admin/users/activate/{{ $user->id }}">
                @csrf
                    <div class="form-label">
                        <input type="submit" value="Activate User">
                    </div>
            </form>
            <form method="POST" action="/admin/users/delete/{{ $user->id }}">
                @csrf
                <div class="form-label">
                    <input type="submit" value="Delete User">
                </div>
            </form>
        </div>  
    @endif
@endforeach

@endsection