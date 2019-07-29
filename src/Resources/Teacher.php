<?php
namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class Teacher extends Resource {
	use FindAll, FindOne;
	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'first_name',
		'middle_name',
		'last_name',
		'teacher_description',
		'teacher_headline',
		'avatar_url',
		'slug',
		'updated_at',
		'created_at'
	];

	/**
	 * @var string
	 */

	protected $model_name = 'User';
	/**
	 * @var string
	 */

	protected $endpoint = 'teachers';
	/**
	 * @var string
	 */

	protected $namespace = 'teacher';
}
