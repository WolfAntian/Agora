<?php

namespace agora;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $primaryKey = 'path';
    public $incrementing = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);

    }
}
