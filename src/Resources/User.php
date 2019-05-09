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
		'roles'
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
}
