<?php

namespace Eduframe\Resources;

use Eduframe\Resource;

/**
 * @property integer id
 */
class CourseTab extends Resource {

	/**
	 * @var array
	 */
	protected $fillable = [
		'name',
		'position',
	];

	/**
	 * @var string
	 */
	protected $model_name = 'CourseTab';

	/**
	 * @var string
	 */
	protected $endpoint = 'course_tabs';

	/**
	 * @var string
	 */
	protected $namespace = 'course_tab';

	/**
	 * @var array
	 */
	protected $singleNestedEntities = [
		'course_tab' => CourseTab::class,
	];
}
