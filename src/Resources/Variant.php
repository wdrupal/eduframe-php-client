<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

/**
 * @property integer id
 */
class Variant extends Resource {

	use FindAll, FindOne;
	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'name',
		'updated_at',
		'created_at'
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
