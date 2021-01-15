<?php

namespace App\Models;

use App\Rizky\Filter\ScopeFilterTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Anime extends Model
{
    use HasSlug, ScopeFilterTrait;

    protected $fillable = [
        'title', 'description', 'type', 'status', 'studio', 'quality', 'rating', 'duration', 'total_episode', 'release_date'
    ];

    protected $with = [
        'genres', 'episodes'
    ];
    
    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'pivot_anime_genres', 'anime_id', 'genre_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
