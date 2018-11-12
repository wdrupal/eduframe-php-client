<?php

namespace Eduframe\Resources;

use Eduframe\Resource;

/**
 * @property integer id
 */
class CourseTabContent extends Resource {

	/**
	 * @var array
	 */
	protected $fillable = [
		'content',
	];

	/**
	 * @var string
	 */
	protected $model_name = 'CourseTabContent';

	/**
	 * @var string
	 */
	protected $endpoint = 'course_tab_contents';

	/**
	 * @var string
	 */
	protected $namespace = 'course_tab_content';
}
