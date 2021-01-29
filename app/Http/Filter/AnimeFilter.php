<?php

/**
 * 
 */

namespace App\Http\Filter;

use App\Rizky\Filter\QueryFilter;

class AnimeFilter extends QueryFilter
{
    public function search($value)
    {
        return $this->builder->where('title', 'LIKE', "%{$value}%");
    }

    public function keyword($value)
    {
        return $this->builder->where('title', 'LIKE', "%{$value}%");
    }
}