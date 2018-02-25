<?php

namespace agora;

use Illuminate\Database\Eloquent\Model;

class CommentStar extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
