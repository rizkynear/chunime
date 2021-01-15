<?php

namespace App\Rizky\Filter;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
	protected $request;

	protected $builder;

	public function __construct(Request $request)
	{
	    $this->request = $request;
	}

	public function apply(Builder $builder)
	{
	    $this->builder = $builder;

	    foreach ($this->filters() as $name => $value) {
	    	$name  = camel_case($name);
	    	
	    	$value = array_filter([$value], function($value){
	    		return ($value !== NULL && $value !== FALSE && $value !== '');
	    	});

	    	if (method_exists($this, $name) && $value) {
	    		call_user_func_array([$this, $name], $value);
	    	}
	    }

	    return $this->builder;
	}

	public function filters()
	{
	    return $this->request->all();
	}
}