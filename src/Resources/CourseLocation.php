<?php

namespace Eduframe\Resources;

use Eduframe\Resource;

/**
 * @property integer id
 */
class CourseLocation extends Resource {

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'name',
		'address'
	];

	/**
	 * @var string
	 */
	protected $model_name = 'CourseLocation';

	/**
	 * @var string
	 */
	protected $endpoint = 'course_location';

	/**
	 * @var string
	 */
	protected $namespace = 'course_location';

	/**
	 * @var array
	 */
	protected $singleNestedEntities = [
		'address' => Address::class,
	];
}
