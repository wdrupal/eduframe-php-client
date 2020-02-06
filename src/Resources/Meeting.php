<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class Meeting extends Resource {
	use FindAll, FindOne;

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'name',
		'planned_course_id',
		'description',
		'description_dashboard',
		'meeting_location_id',
		'start_date_time',
		'end_date_time',
		'updated_at',
		'created_at'
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'meetings';

	/**
	 * @var string
	 */
	protected $namespace = 'meeting';
}
