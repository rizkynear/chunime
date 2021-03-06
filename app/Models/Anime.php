<?php

namespace App\Models;

use App\Rizky\Filter\ScopeFilterTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Anime extends Model
{
    use HasSlug, ScopeFilterTrait;

    const CROP_BANNER = [1200, 600];
    const CROP_THUMBNAIL = [265, 440];
    const IMAGE_FOLDER = 'animes';

    protected $fillable = [
        'title', 'description', 'type', 'status', 'studio', 'quality', 'rating', 'duration', 'total_episode', 'release_date'
    ];

    protected $with = [
        'genres', 'episodes'
    ];

    protected $appends = [
        'main_genre_name', 'published_episode', 'main_genre_slug'
    ];
    
    public function episodes()
    {
        return $this->hasMany(Episode::class)->orderBy('slug');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'pivot_anime_genres', 'anime_id', 'genre_id');
    }

    public function getPublishedEpisodeAttribute()
    {
        return $this->episodes()->where('status', Episode::PUBLISH)->count();
    }

    public function getMainGenreNameAttribute()
    {
        return optional($this->genres->first())->name;
    }

    public function getMainGenreSlugAttribute()
    {
        return optional($this->genres->first())->slug;
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'LIKE', "%Completed%");
    }

    public function scopeHasEpisode($query)
    {
        return $query->has('episodes');
    }

    public function scopeOngoing($query)
    {
        return $query->where('status', 'LIKE', "%On Going%");
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->allowDuplicateSlugs()
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
