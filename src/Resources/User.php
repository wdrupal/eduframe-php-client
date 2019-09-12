<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class User extends Resource{

	use FindAll, FindOne;

	protected $fillable = [
		'id',
		'first_name',
		'middle_name',
		'last_name',
		'email',
		'company_name',
		'phone',
		'address',
		'invoice_address',
		'roles',
		'signup_answers',
		'updated_at',
		'created_at'
	];

	/**
	 * @var string
	 */
	protected $model_name = 'Users';

	/**
	 * @var string
	 */
	protected $endpoint = 'users';

	/**
	 * @var string
	 */
	protected $namespace = 'user';

	/**
	 * @var array
	 */
	protected $singleNestedEntities = [
		'address' => Address::class,
		'invoice_address' => Address::class,
	];

	/**
	 * @var array
	 */
	protected $multipleNestedEntities = [
		'signup_answers' => [
			'entity' => SignupAnswer::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		],
	];
}
