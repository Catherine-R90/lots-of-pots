<?php
use Jenssegers\Agent\Agent;
$agent = new Agent();
?>

@extends('ui.whole_page')

@section('main_content')

@if($agent->isDesktop())
<div class="boxed-header">
    <h3>Privacy Policy</h3>
</div>

<div class="faq">    
    <h3>Introduction</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis mattis augue, nec bibendum nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius sit amet lorem sit amet lobortis. Donec finibus, urna ac mattis rutrum, erat enim iaculis quam, vel varius diam lacus finibus tortor. Vivamus tortor dolor, ullamcorper id tellus finibus, vehicula porta lectus. Quisque commodo mauris vitae turpis tristique, non vestibulum erat egestas. Quisque sagittis, felis a vulputate dictum, nulla risus consequat odio, sed auctor diam eros sagittis leo. Nulla facilisi. Vivamus gravida sed ligula eu hendrerit. Etiam ut nunc erat. Etiam malesuada, lorem sed porttitor pulvinar, purus ex volutpat orci, eget eleifend nulla sem ut est. Donec a orci at magna blandit eleifend ut vitae ex. Duis non mollis mi. Nam vestibulum nibh ut libero ullamcorper, sit amet tristique justo molestie. Pellentesque pulvinar neque feugiat nisi dapibus, vitae consequat sem vehicula. </p>

    <h3>What information do we collect?</h3>
    <p>Quisque non purus mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras a tortor dui. Maecenas non nisi sapien. Suspendisse accumsan, ipsum eu pharetra malesuada, ligula nisi sollicitudin est, non iaculis lorem justo et lorem. Proin diam sem, malesuada at ipsum ultrices, porta sodales dui. Nunc lobortis tortor vel diam elementum vehicula. Nunc blandit velit nunc, quis facilisis ligula rhoncus eget. Fusce placerat varius viverra. Cras sed sem erat. Nam egestas sed odio vitae hendrerit. Vestibulum semper finibus ipsum quis ullamcorper.</p>

    <h3>How do we use personal information?</h3>
    <p> Aliquam varius venenatis placerat. Pellentesque nec augue id eros condimentum luctus. Praesent risus sapien, accumsan ut commodo eget, sagittis sit amet purus. Donec a tempor odio. Cras ornare mattis hendrerit. Mauris eu mi quis eros eleifend dignissim tempor at justo. Donec aliquam erat ac leo condimentum dictum id non felis. Curabitur egestas turpis ex, in bibendum quam scelerisque a.</p>

    <h3>What legal basis do we have for processing your personal data?</h3>
    <p>Quisque congue sed augue sit amet interdum. Aliquam vitae dui suscipit, imperdiet mi lacinia, commodo nisi. Proin a sem scelerisque, dictum dolor interdum, semper turpis. Aenean sapien nisi, finibus vehicula dapibus non, tempor vitae ex. Maecenas egestas hendrerit orci, nec ultrices libero volutpat nec. Mauris metus magna, lobortis facilisis sem non, fringilla viverra tellus. Aliquam id auctor ligula. Nam vel consectetur nunc. Proin iaculis lorem turpis, non pharetra sem scelerisque eget.</p>
</div>
@endif

@if($agent->isMobile())
<div class="mobile-header">
    <h3>Privacy Policy</h3>
</div>

<div class="mobile-faq">
    <h3>Introduction</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis mattis augue, nec bibendum nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius sit amet lorem sit amet lobortis. Donec finibus, urna ac mattis rutrum, erat enim iaculis quam, vel varius diam lacus finibus tortor. Vivamus tortor dolor, ullamcorper id tellus finibus, vehicula porta lectus. Quisque commodo mauris vitae turpis tristique, non vestibulum erat egestas. Quisque sagittis, felis a vulputate dictum, nulla risus consequat odio, sed auctor diam eros sagittis leo. Nulla facilisi. Vivamus gravida sed ligula eu hendrerit. Etiam ut nunc erat. Etiam malesuada, lorem sed porttitor pulvinar, purus ex volutpat orci, eget eleifend nulla sem ut est. Donec a orci at magna blandit eleifend ut vitae ex. Duis non mollis mi. Nam vestibulum nibh ut libero ullamcorper, sit amet tristique justo molestie. Pellentesque pulvinar neque feugiat nisi dapibus, vitae consequat sem vehicula. </p>

    <h3>What information do we collect?</h3>
    <p>Quisque non purus mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras a tortor dui. Maecenas non nisi sapien. Suspendisse accumsan, ipsum eu pharetra malesuada, ligula nisi sollicitudin est, non iaculis lorem justo et lorem. Proin diam sem, malesuada at ipsum ultrices, porta sodales dui. Nunc lobortis tortor vel diam elementum vehicula. Nunc blandit velit nunc, quis facilisis ligula rhoncus eget. Fusce placerat varius viverra. Cras sed sem erat. Nam egestas sed odio vitae hendrerit. Vestibulum semper finibus ipsum quis ullamcorper.</p>

    <h3>How do we use personal information?</h3>
    <p> Aliquam varius venenatis placerat. Pellentesque nec augue id eros condimentum luctus. Praesent risus sapien, accumsan ut commodo eget, sagittis sit amet purus. Donec a tempor odio. Cras ornare mattis hendrerit. Mauris eu mi quis eros eleifend dignissim tempor at justo. Donec aliquam erat ac leo condimentum dictum id non felis. Curabitur egestas turpis ex, in bibendum quam scelerisque a.</p>

    <h3>What legal basis do we have for processing your personal data?</h3>
    <p>Quisque congue sed augue sit amet interdum. Aliquam vitae dui suscipit, imperdiet mi lacinia, commodo nisi. Proin a sem scelerisque, dictum dolor interdum, semper turpis. Aenean sapien nisi, finibus vehicula dapibus non, tempor vitae ex. Maecenas egestas hendrerit orci, nec ultrices libero volutpat nec. Mauris metus magna, lobortis facilisis sem non, fringilla viverra tellus. Aliquam id auctor ligula. Nam vel consectetur nunc. Proin iaculis lorem turpis, non pharetra sem scelerisque eget.</p>
</div>
@endif

@endsection