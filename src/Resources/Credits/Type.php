<?php

namespace Eduframe\Resources\Credits;

use Eduframe\Resource;
use Eduframe\Resources\Category;

class Type extends Resource {

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'name',
		'category'
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'credit_type';

	/**
	 * @var string
	 */
	protected $namespace = 'credit_type';

	/**
	 * @var array
	 */
	protected $singleNestedEntities = [
		'category' => Category::class,
	];
}
