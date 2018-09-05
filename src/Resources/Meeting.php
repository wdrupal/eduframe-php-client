<?php

namespace Eduframe\Resources;

use Eduframe\Resource;

class Meeting extends Resource
{

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'planned_course_id',
        'description',
        'description_dashboard',
        'meeting_location_id',
        'start_date_time',
        'end_date_time',
        'date',
        'date_string',
        'updated_at',
        'created_at',
        'start_time',
        'end_time'
    ];

    /**
     * @var string
     */
    protected $endpoint = 'meetings';

    /**
     * @var string
     */
    protected $namespace = 'meeting';
}
