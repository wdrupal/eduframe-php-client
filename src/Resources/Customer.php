<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class Customer extends Resource {

	use FindAll, FindOne;

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'first_name',
		'middle_name',
		'last_name',
		'company_name',
		'email',
		'phone',
		#'wants_newsletter',
		#'roles',
		'address',
		'updated_at',
		'created_at'
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'customers';

	/**
	 * @var string
	 */
	protected $namespace = 'customer';

	/**
	 * @var array
	 */
	protected $multipleNestedEntities = [
		'address' => [
			'entity' => Address::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		],
	];
}
