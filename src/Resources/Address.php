<?php

namespace Eduframe\Resources;

use Eduframe\Resource;

class Address extends Resource {

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'address',
		'postal_code',
		'city',
		'country',
		'updated_at',
		'created_at'
	];

	/**
	 * @var string
	 */
	protected $endpoint = 'addresses';

	/**
	 * @var string
	 */
	protected $namespace = 'address';
}
