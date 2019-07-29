<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class PlannedCourse extends Resource {

	use FindAll, FindOne;

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'type',
		'course_id',
		'start_date',
		'end_date',
		'status',
		'duration_in_days',
		'duration_in_hours',
		'availability_state',
		'cost_scheme',
		'cost',
		'currency',
		'meetings',
		'teachers',
		'updated_at',
		'created_at',
		'course_variant',
		'course_location',
		'available_places',
		'max_participants',
		'current_participants'
	];

	/**
	 * @var string
	 */
	protected $model_name = 'PlannedCourse';

	/**
	 * @var string
	 */
	protected $endpoint = 'planned_courses';

	/**
	 * @var string
	 */
	protected $namespace = 'planned_course';

	/**
	 * @var array
	 */
	protected $multipleNestedEntities = [
		'meetings'    => [
			'entity' => Meeting::class,
			'type'   => self::NESTING_TYPE_ARRAY_OF_OBJECTS,
		],
		'teachers'    => [
			'entity' => Teacher::class,
			'type'   => self::NESTING_TYPE_ARRAY_OF_OBJECTS,
		]
	];

	/**
	 * @var array
	 */
	protected $singleNestedEntities = [
		'course_variant'  => CourseVariant::class,
		'course_location' => Location::class,
	];
}
