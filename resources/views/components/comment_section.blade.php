<?php
use App\Models\CommentImage;
?>

@if($agent->isdesktop())
<div class="comment_section">
    @if(count($comments) == 0)

        <div class="subheader">
            <p>Start the conversation!</p>
        </div>

    @endif

    @foreach($comments as $comment)

        <?php 
        $imageId = $comment->comment_image_id;
        $image = CommentImage::find($imageId);
        ?>

        <div class="comment">

            <div class="user">
                {{-- GUEST POSTS --}}
                @if($comment->user_id == null)
                    <p>Posted by: Guest</p>
                @else

                {{-- USER POSTS --}}
                    <p>Posted by: {{$comment->user_id}}</p>
                @endif

                @if($comment->updated_at != $comment->created_at)
                    <p>Edited at {{$comment->updated_at}}</p>
                @endif
            </div>

            <div class="comment_text">
                <p>"{{$comment->comment}}"</p>

            @if($image != null)
                <img src="{{ asset('storage/app/'.$image->comment_image) }}">
            @endif
            </div>

            @if($comment->user_id == null && $comment->user_session == $userSession)
            <div class="edit_comment">
                <form method="POST" action="/comment/edit/{{$comment->id}}" enctype="multipart/form-data">
                    @csrf

                        <div class="form-label">
                            <label>Edit your comment</label>
                        </div>

                        <div class="form-label">
                            <label for="comment">Your comment</label>
                            <textarea type="text" name="comment" required placeholder="{{ $comment->comment }}"></textarea>
                        </div>

                        <div class="form-label">
                            <label for="comment_image">Upload an image of your recipe results!</label>
                            <input id="comment-add-image" type="file" name="comment_image" accept="image/*">
                        </div>

                        <div class="grey-link">
                            <input type="submit" value="Update your comment">
                        </div>

                </form>
            </div>

            <div class="delete_comment">
                <form method="POST" action="/comment/delete/{{$comment->id}}">
                    @csrf

                    <div class="grey-link">
                        <input type="submit" value="Delete your comment">
                    </div>

                </form>
            </div>
            @endif

        </div>
    @endforeach
</div>
@endif

@if($agent->isMobile())
    @if(count($comments) == 0)

        <div class="mobile-subheader">
            <h3>Start the conversation!</h3>
        </div>

    @endif

    @foreach($comments as $comment)

        <?php 
        $imageId = $comment->comment_image_id;
        $image = CommentImage::find($imageId);
        ?>

        <div class="mobile-form">
            @if($comment->user_id == null)
            <div class="mobile-user">
                <p>Posted by: Guest</p>
            </div>
            @else

            {{-- USER POSTS --}}
            <div class="mobile-user">
                <p>Posted by: {{$comment->user_id}}</p>
            </div>
            @endif

            @if($comment->updated_at != $comment->created_at)
                <p>Edited at {{$comment->updated_at}}</p>
            @endif

            <div class="hr"></div>

            {{-- COMMENT --}}
            <div class="mobile-comment-text">
                <p>"{{$comment->comment}}"</p>

                @if($image != null)
                    <div clas="comment_image">
                        <img src="{{ asset('storage/app/'.$image->comment_image) }}">
                    </div>
                @endif
            </div>

            

            {{-- EDIT COMMENT --}}
            @if($comment->user_id == null && $comment->user_session == $userSession)
            <form method="POST" action="/comment/edit/{{$comment->id}}" enctype="multipart/form-data">
                @csrf

                    <div class="mobile-form-label">
                        <label>Edit your comment</label>
                    </div>

                    <div class="mobile-comment-form">
                        <label for="comment">Your comment</label>
                        <textarea type="text" name="comment" required placeholder="{{ $comment->comment }}"></textarea>
                    </div>

                    <div class="mobile-form-label">
                        <label for="comment_image">Upload an image of your recipe results!</label>
                        <input type="file" name="comment_image" accept="image/*">
                    </div>

                    <div class="mobile-mobile-link">
                        <input type="submit" value="Update your comment">
                    </div>

            </form>

            {{-- DELETE COMMENT --}}
            <div class="delete_comment">
                <form method="POST" action="/comment/delete/{{$comment->id}}">
                    @csrf

                    <div class="mobile-link">
                        <input type="submit" value="Delete your comment">
                    </div>

                </form>
            </div>
            @endif

        </div>
    @endforeach
@endif