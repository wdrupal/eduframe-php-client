<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Resources\Plugins\Data;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;
use Eduframe\Traits\HasPluginData;

class Teacher extends Resource {

	use FindAll, FindOne, HasPluginData;

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'first_name',
		'middle_name',
		'last_name',
		'teacher_description',
		'teacher_headline',
		'avatar_url',
		'slug',
		'updated_at',
		'created_at',
		'plugin_data'
	];

	/**
	 * @var string
	 */
	protected $model_name = 'User';

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
	protected $multipleNestedEntities = [
		'plugin_data' => [
			'entity' => Data::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		],
	];
}
