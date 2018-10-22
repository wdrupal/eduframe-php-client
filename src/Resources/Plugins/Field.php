<?php

namespace Eduframe\Resources\Plugins;

use Eduframe\Resource;
use Eduframe\Traits\Storable;

class Field extends Resource {

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'title',
		'data_type',
		'unique'
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'plugins/field';

	/**
	 * @var string
	 */
	protected $namespace = 'field';
}