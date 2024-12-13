<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'published_at'];

    /**
     * Get the author associated with the post.
     */
    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
