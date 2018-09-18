<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [];

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function scopeFirstCategory(Builder $builder)
    {
        $builder->where('parent_id', null);
    }

    public function Threads()
    {
        return $this->belongsTo(Thread::class);
    }
}
