<?php

namespace Eduframe\Resources\Credits;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;

/**
 * @property integer course_id
 */
class Definition extends Resource {

	use FindAll;

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'course_id',
		'credits',
		'category_name',
		'type_name',
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'credit_definitions';

	/**
	 * @var string
	 */
	protected $namespace = 'credit_definition';

	/**
	 * @return string
	 */
	public function getEndpoint() {
		return 'courses/' . $this->course_id . '/' . $this->endpoint;
	}
}
