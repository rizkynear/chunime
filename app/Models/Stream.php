<?php

namespace App\Models;

use App\Rizky\Filter\ScopeFilterTrait;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use ScopeFilterTrait;

    protected $fillable = [
        'server_name', 'link', 'quality'
    ];

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }

    public function scopeDefault($query)
    {
        return $query->where('quality', '360');
    }
}
