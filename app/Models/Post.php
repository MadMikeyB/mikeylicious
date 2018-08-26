<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * @var array The properties guarded from mass assignment
     */
    public $guarded = [];

    /**
     * The attributes that should be cast to carbon instances.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'published_at'];

    /**
     * Set the route key name for Laravel's Route Model Binding
     * 
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Set the Published At Attribute
     * 
     * @return void
     */
    public function setPublishedAtAttribute($publishedAt)
    {
        if (!$publishedAt) {
            $this->attributes['published_at'] = now()->toDateTimeString();
        }
    }

    /**
     * Get the Featured Image Attribute
     * 
     * @return \App\Models\Image
     */
    public function getFeaturedImageAttribute()
    {
        return $this->images->first();
    }

    /**
     * Get the Excerpt Attribute
     * 
     * @return string
     */
    public function getExcerptAttribute()
    {
        return str_limit(strip_tags($this->body), 140);
    }

    /**
     * A post belongs to a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A post has many images
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }

    /**
     * A post belongs to a category
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}