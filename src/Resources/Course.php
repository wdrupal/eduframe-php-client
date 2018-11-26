<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Resources\Credits\Definition;
use Eduframe\Resources\Plugins\Data;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;
use Eduframe\Traits\HasPluginData;

/**
 * @property integer id
 */
class Course extends Resource {

	use FindAll, FindOne, HasPluginData;

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'slug',
		'name',
		'position',
		'meta_title',
		'meta_description',
		'code',
		'duration',
		'starting_price',
		'signup_url',
		'slug_history',
		'avatar_url',
		'avatar_thumb_url',
		'avatar',
		'category_id',
		'level',
		'result',
		'updated_at',
		'created_at',
		'plugin_data',
		'course_tab_contents',
		'credit_definitions'
	];

	/**
	 * @var string
	 */
	protected $model_name = 'Course';

	/**
	 * @var string
	 */
	protected $endpoint = 'courses';

	/**
	 * @var string
	 */
	protected $namespace = 'course';

	/**
	 * @var array
	 */
	protected $multipleNestedEntities = [
		'plugin_data' => [
			'entity' => Data::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		],
		'course_tab_contents' => [
			'entity' => CourseTabContent::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		],
		'credit_definitions' => [
			'entity' => Definition::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		],
	];
}
