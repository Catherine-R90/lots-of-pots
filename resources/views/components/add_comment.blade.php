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

        <div class="grey-link">
            <input type="submit" value="Add comment">
        </div>

    </form>

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

                <input type="submit" value="Add comment">

        </form>

    </div>
@endif