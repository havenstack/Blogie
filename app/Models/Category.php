<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    protected $fillable = ['user_id', 'name'];

    /**
     * Get the posts associated with the category.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    /**
     * Get the latest post associated with the category.
     */
    public function latestPost(): HasOne
    {
        return $this->hasOne(Post::class, 'category_id', 'id')
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->with('author');
    }
}
