<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentImage extends Model
{
    protected $fillable = [
        "comment_image",
        "comment_id"
    ];

    public function comment() {
        return $this->belongsTo('App\Models\Comment');
    }
}
