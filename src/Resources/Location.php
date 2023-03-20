<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class Location extends Resource
{
    use FindAll, FindOne;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'address',
        'updated_at',
        'created_at'
    ];

    /**
     * @var string
     */
    protected $model_name = 'Location';

    /**
     * @var string
     */
    protected $endpoint = 'course_locations';

    /**
     * @var string
     */
    protected $namespace = 'location';

    /**
     * @var array
     */
    protected $singleNestedEntities = [
        'address' => Address::class,
    ];
}
