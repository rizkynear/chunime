<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Episode extends Model
{
    use HasSlug;

    const DRAFT = 0;
    const PUBLISH = 1;

    protected $with = [
        'downloads'
    ];

    protected $fillable = [
        'title'
    ];

    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    public function getStatusNameAttribute()
    {
        $status = 'Published';

        if ($this->status == self::DRAFT) {
            $status = 'Draft';
        }

        return $status;
    }

    public function getIsPublishedAttribute()
    {
        return $this->status == self::PUBLISH;
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
