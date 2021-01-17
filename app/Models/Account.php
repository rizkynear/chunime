<?php

namespace App\Models;

use App\Rizky\Filter\ScopeFilterTrait;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use ScopeFilterTrait;

    protected $fillable = [
        'username', 'password', 'description'  
    ];
}
