<?php

namespace Eduframe\Resources\Plugins;

use Eduframe\Resource;
use Eduframe\Traits\Storable;

class Data extends Resource {

	use Storable;

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'title',
		'model_type',
		'model_id',
		'data',
		'field',
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'plugins/data';

	/**
	 * @var string
	 */
	protected $namespace = 'data';

	/**
	 * @var array
	 */
	protected $singleNestedEntities = [
		'field' => Field::class,
	];
	
}