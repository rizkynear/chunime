<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
