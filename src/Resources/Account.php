<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class Account extends Resource{
	use FindAll, FindOne;

	protected $fillable = [
		'id',
		'name',
		'email',
		'account_type',
		'personal_user_id',
		'address',
		'signup_answers',
		'updated_at',
		'created_at'
	];

	/**
	 * @var string
	 */
	protected $model_name = 'Accounts';

	/**
	 * @var string
	 */
	protected $endpoint = 'accounts';

	/**
	 * @var string
	 */
	protected $namespace = 'account';

	/**
	 * @var array
	 */
	protected $singleNestedEntities = [
		'address' => Address::class,
	];

	/**
	 * @var array
	 */
	protected $multipleNestedEntities = [
		'signup_answers' => [
			'entity' => SignupAnswer::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		]
	];
}
