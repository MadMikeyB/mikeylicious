<?php

namespace App\Models;

use Spatie\Feed\FeedItem;
use Spatie\Feed\Feedable;
use App\Notifications\PostPublished;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements Feedable
{
    use SoftDeletes, Notifiable, Viewable;

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
     * Boot the User Model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($post) {
            if (env('APP_ENV') !== 'local') {
                if ((is_null($post->published_at)) && ($post->active)) {
                    $post->notify(new PostPublished($post));
                }
            }
        });
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->intro)
            ->updated($this->updated_at)
            ->link(route('posts.show', $this))
            ->author($this->author);
    }


    public static function getFeedItems()
    {
       return self::latest()->published()->active()->get();
    }

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
     * Get the Intro Attribute
     *
     * @return string
     */
    public function getIntroAttribute()
    {
        return strip_tags(substr($this->body, strpos($this->body, "<p"), strpos($this->body, "</p>")+4));
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
