<?php

namespace Eduframe\Resources;

use Eduframe\Resource;

class LeadInterest extends Resource {

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'course_id',
		'planned_course_id'
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'courses_leads';

	/**
	 * @var string
	 */
	protected $model_name = 'LeadInterest';

	/**
	 * @var string
	 */
	protected $namespace = 'courses_leads';

}
