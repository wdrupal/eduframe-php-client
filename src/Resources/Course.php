<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;

class Course extends Resource
{

    use FindAll, FindOne;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'slug',
        'name',
        'avatar_url',
        'avatar_thumb_url',
        'code',
        'avatar',
        'starting_price',
        'category_id',
        'level',
        'updated_at',
        'created_at'
    ];

    /**
     * @var string
     */
    protected $endpoint = 'courses';

    /**
     * @var string
     */
    protected $namespace = 'course';
}
