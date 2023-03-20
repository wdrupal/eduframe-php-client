<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class Enrollment extends Resource
{
    use FindAll, FindOne;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'student_id',
        'status',
        'comments',
        'graduation_state',
        'updated_at',
        'created_at'
    ];

    /**
     * @var string
     */
    protected $endpoint = 'enrollments';

    /**
     * @var string
     */
    protected $namespace = 'enrollment';
}
