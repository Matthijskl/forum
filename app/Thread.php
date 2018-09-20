<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'name',
        'category_id'
    ];

    public function Categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
}
