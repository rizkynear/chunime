<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $fillable = [
        'server_name', 'link', 'quality'
    ];

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
