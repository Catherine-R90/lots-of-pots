<?php
use Jenssegers\Agent\Agent;

$agent = new Agent;
?>

@extends('ui.whole_page')

@section('main_content')

@if($agent->isDesktop())
<div class="boxed-header">

    <h3>Your payment has been cancelled</h3>

</div>
@endif
@if($agent->isMobile())
<div class="mobile-header">

    <h3>Your payment has been cancelled</h3>

</div>
@endif

@endsection