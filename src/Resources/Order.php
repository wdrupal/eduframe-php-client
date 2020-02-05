<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class Order extends Resource {
	use FindAll, FindOne;

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'number',
		'status',
		'start_date',
		'end_date',
		'number_of_students',
		'updated_at',
		'created_at'
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'orders';

	/**
	 * @var string
	 */
	protected $namespace = 'order';
}
