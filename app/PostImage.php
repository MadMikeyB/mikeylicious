<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    /**
     * @var array The properties guarded from mass assignment
     */
    public $guarded = [];

    /**
     * A post image belongs to a post
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * A post image belongs to a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
