<?php

namespace agora;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function threads()
    {
        return $this->hasMany(Comment::class);
    }
}
