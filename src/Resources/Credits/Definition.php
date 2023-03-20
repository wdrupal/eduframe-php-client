<?php

namespace Eduframe\Resources\Credits;

use Eduframe\Resource;

class Definition extends Resource
{

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'credits',
        'type'
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
     * @var array
     */
    protected $singleNestedEntities = [
        'type' => Type::class,
    ];
}
