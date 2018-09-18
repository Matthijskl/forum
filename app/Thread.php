<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function Categories()
    {
        return $this->belongsTo(Category::class);
    }
}
