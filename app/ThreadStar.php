<?php

namespace agora;

use Illuminate\Database\Eloquent\Model;

class ThreadStar extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
