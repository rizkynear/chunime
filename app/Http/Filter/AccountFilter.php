<?php

/**
 * 
 */

namespace App\Http\Filter;

use App\Rizky\Filter\QueryFilter;

class AccountFilter extends QueryFilter
{
    public function search($value)
    {
        return $this->builder->where('username', 'LIKE', "%{$value}%")
            ->orWhere('description', 'LIKE', "%{$value}%");
    }
}