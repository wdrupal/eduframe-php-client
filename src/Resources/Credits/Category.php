<?php

namespace Eduframe\Resources\Credits;

use Eduframe\Resource;

class Category extends Resource {

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'name'
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'credit_category';

	/**
	 * @var string
	 */
	protected $namespace = 'credit_category';
}
