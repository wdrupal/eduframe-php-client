<?php

namespace Eduframe\Resource;

use Eduframe\Resource;

class Course extends Resource
{
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