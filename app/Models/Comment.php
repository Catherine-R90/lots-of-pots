<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        "user_id",
        "recipe_id",
        "comment",
        "comment_image_id",
        "user_session"
    ];

    public function comment_image() {
        return $this->hasOne('App\Models\CommentImage');
    }
}
