<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

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
        'position',
        'meta_title',
        'meta_description',
        'code',
        'duration',
        'starting_price',
        'signup_url',
        'slug_history',
        'avatar_url',
        'avatar_thumb_url',
        'avatar',
        'category_id',
        'level',
        'result',
        'updated_at',
        'created_at',
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
