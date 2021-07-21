<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\CommentImage;
use App\Models\Recipe;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class CommentsController extends Controller
{
    public function PostComment(Request $request){
        $recipeId = $request->input('recipe_id');
        $commentText = $request->input('comment');
        $sessionId = session()->getId();

        if($user = Sentinel::check()) {
            $comment = Comment::create([
                "recipe_id" => $recipeId,
                "comment" => $commentText,
                "user_id" => $user->id,
            ]);
        } else {
            $comment = Comment::create([
                "recipe_id" => $recipeId,
                "comment" => $commentText,
                "user_session" => $sessionId,
            ]);
        }
        
        if($request->file('comment_image') != null) {
            $imageName = $request->file('comment_image')->store('commentImages');
            $commentImage = CommentImage::create([
                "comment_image" => $imageName,
                "comment_id" => $comment->id,
            ]);

            $comment->comment_image_id = $commentImage->id;
            $comment->save();
        }

        return redirect()->back();
    }

    public function EditComment($id, Request $request) {
        $comment = Comment::find($id);
        $oldImage = CommentImage::where("comment_id", $id)->first();
        $commentText = $request->input('comment');

        if($user = Sentinel::check()) {
            $comment->comment = $commentText;
        } else {
            $sessionId = session()->getId();
            $comment->user_session = $sessionId;
            $comment->comment = $commentText;
        } 
        
        $comment->save();

        if($request->file('comment_image') != null) {
            $imageName = $request->file('comment_image')->store('commentImages');
            $newImage = CommentImage::updateOrCreate(
                ['comment_id' => $id],
                [
                    'comment_image' => $imageName,
                    'comment_id' => $id
                ]
            );
            $comment->comment_image_id = $newImage->id;
            $comment->save();
        }
        return redirect()->back();
    }

    public function DeleteComment($id) {
        $comment = Comment::find($id);
        $comment->comment_image_id = null;
        $comment->save();
        $commentImage = CommentImage::where('comment_id', $id)->first();
        if($commentImage !=  null) {
            $commentImage->delete();
        }    
        $comment->delete();
        return redirect()->back();
    }
}
