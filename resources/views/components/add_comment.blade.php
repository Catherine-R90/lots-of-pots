@if($agent->isDesktop())
<div class="comment_form">

    <form method="POST" action="/comment/add" enctype="multipart/form-data">
        @csrf

        <input type="hidden" value="{{ $id }}" name="recipe_id">

        <div class="form-label">
            <label for="comment">Your comment</label>
            <textarea type="text" name="comment" required></textarea>
        </div>

        <div class="form-label">
            <label for="comment_image">Upload an image of your recipe results!</label>
            <input id="comment-add-image" type="file" name="comment_image" accept="image/*">
        </div>

        @if($user != null)

            <div class="grey-link">
                <input type="submit" value="Add comment">
            </div>
        @elseif($user == null) 
            <div class="grey-link">
                <input type="submit" value="Add comment as Guest">
            </div>
        
        @endif
    </form>

    <?php
        $current_url = url()->current();
    ?>

    @if($user == null)
        <div class="grey-link">
            <form method="GET" action="/login">
                @csrf

                <input type="hidden" name="current_url" value="{{ $current_url }}">

                <input type="submit" value="Login">
            </form>
        </div>
    @endif

</div>
@endif

@if($agent->isMobile())
    <div class="mobile-add-comment">

        <form class="mobile-form" method="POST" action="/comment/add" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{ $id }}" name="recipe_id">

            <div class="mobile-comment-form">
                <label for="comment">Your comment</label>
                <textarea type="text" name="comment" required></textarea>
            </div>

            <div class="mobile-comment-form">
                <label for="comment_image">Upload an image of your recipe results!</label>
                <input type="file" name="comment_image" accept="image/*">
            </div>

            @if($user != null)
                <input type="submit" value="Add comment">
            @elseif($user == null)
                <input type="submit" value="Add comment as Guest">
            @endif

        </form>

        <?php
        $current_url = url()->current();
        ?>

        @if($user == null)
            <form class="mobile-form" method="GET" action="/login">
                @csrf

                <input type="hidden" name="current_url" value="{{ $current_url }}">

                <input type="submit" value="Login">
            </form>
        @endif

    </div>
@endif