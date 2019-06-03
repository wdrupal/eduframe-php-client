<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

/**
 * @property integer id
 */
class CourseLocation extends Resource {

	use FindAll, FindOne;
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
	protected $endpoint = 'course_locations';

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
