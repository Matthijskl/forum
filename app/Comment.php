<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'user_id',
        'thread_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function threads()
    {
        return $this->belongsTo(Thread::class, 'thread_id', 'id');
    }
}
