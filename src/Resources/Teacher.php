<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class Teacher extends Resource {
	use FindAll, FindOne;

	protected $fillable = [
		'id',
		'first_name',
		'middle_name',
		'last_name',
		'email',
		'roles',
		'phone',
		'address',
		'teacher_headline',
    	'teacher_description',
    	'employee_number',
		'slug',
		'avatar_url',
		'labels',
		'personal_account',
		'signup_answers',
		'updated_at',
		'created_at'
	];

	/**
	 * @var string
	 */
	protected $model_name = 'Teachers';

	/**
	 * @var string
	 */
	protected $endpoint = 'teachers';

	/**
	 * @var string
	 */
	protected $namespace = 'teacher';

	/**
	 * @var array
	 */
	protected $singleNestedEntities = [
		'address' => Address::class,
		'personal_account' => Account::class,
	];

	/**
	 * @var array
	 */
	protected $multipleNestedEntities = [
		'signup_answers' => [
			'entity' => SignupAnswer::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		],
		'labels' => [
			'entity' => Label::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		],
	];
}
