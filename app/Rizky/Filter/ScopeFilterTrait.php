<?php

namespace App\Rizky\Filter;

use App\Rizky\Filter\QueryFilter;

trait ScopeFilterTrait
{
	protected $request;

	public function scopeFilter($query, QueryFilter $filters)
	{
	    return $filters->apply($query);
	}
}