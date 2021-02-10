@extends('ui.whole_page')

@section('page_type')

<x-admin_nav/>

<div class="boxed-header">

    <h3>Select Product to Edit</h3>

</div>

@if(count($products) == 0)
            
    <div class='notification'>
    
        <p>No recipes to edit</p>
        
    </div>
    
@endif

@foreach ($products as $product) 
<div class="form">
    <form action="/admin/products/edit/{{ $product->id }}">
    @csrf

    <div class="select-button">
        <input type="submit" value="{{ $product->name }}">
    </div>

    </form>
</div>
@endforeach

@endsection