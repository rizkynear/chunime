<?php

/**
 * 
 */

namespace App\Http\Filter;

use App\Rizky\Filter\QueryFilter;

class StreamFilter extends QueryFilter
{
    public function stream($value)
    {
        return $this->builder->where('quality', 'LIKE', "%{$value}%");
    }
}