<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;

/**
 * @property integer id
 */
class Referral extends Resource {

	use FindAll;

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
	protected $model_name = 'Referral';

	/**
	 * @var string
	 */
	protected $endpoint = 'referrals';

	/**
	 * @var string
	 */
	protected $namespace = 'referrals';
}
