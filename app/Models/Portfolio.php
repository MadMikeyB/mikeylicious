<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
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
        $this->attributes['published_at'] = $publishedAt;
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
     * A portfolio belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A portfolio has many images
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }
    
    /**
     * Scope a query to only include published posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
