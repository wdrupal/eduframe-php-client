<?php

namespace Eduframe\Resources;

use Eduframe\Resource;

/**
 * @property integer id
 */
class CourseVariant extends Resource {

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'name',
	];

	/**
	 * @var string
	 */
	protected $model_name = 'CourseVariant';

	/**
	 * @var string
	 */
	protected $endpoint = 'course_variants';

	/**
	 * @var string
	 */
	protected $namespace = 'course_variant';
	
}
