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
		'phone',
		'address',
		'roles',
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
	];
}
