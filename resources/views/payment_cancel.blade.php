<<<<<<< HEAD
<?php
use Jenssegers\Agent\Agent;

$agent = new Agent;
?>

=======
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9
@extends('ui.whole_page')

@section('main_content')

<<<<<<< HEAD
@if($agent->isDesktop())
=======
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9
<div class="boxed-header">

    <h3>Your payment has been cancelled</h3>

</div>
<<<<<<< HEAD
@endif
@if($agent->isMobile())
<div class="mobile-header">

    <h3>Your payment has been cancelled</h3>

</div>
@endif
=======
>>>>>>> 0831cf0753259b73cb3ece5f6b19efa2ed4e05e9

@endsection