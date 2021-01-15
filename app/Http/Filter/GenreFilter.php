<?php

/**
 * 
 */

namespace App\Http\Filter;

use App\Rizky\Filter\QueryFilter;

class GenreFilter extends QueryFilter
{
    public function search($value)
    {
        return $this->builder->where('name', 'LIKE', "%{$value}%");
    }
}