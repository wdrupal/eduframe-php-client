<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Resources\Plugins\Data;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;
use Eduframe\Traits\HasPluginData;

/**
 * @property integer id
 */
class Category extends Resource {

	use FindAll, FindOne, HasPluginData;

	/**
	 * @var array
	 */
	protected $fillable = [
		'id',
		'name',
		'position',
		'updated_at',
		'created_at',
		'plugin_data',
	];

	/**
	 * @var string
	 */
	protected $model_name = 'Category';

	/**
	 * @var string
	 */
	protected $endpoint = 'categories';

	/**
	 * @var string
	 */
	protected $namespace = 'category';

	/**
	 * @var array
	 */
	protected $multipleNestedEntities = [
		'plugin_data' => [
			'entity' => Data::class,
			'type'   => self::NESTING_TYPE_NESTED_OBJECTS,
		],
	];
}
