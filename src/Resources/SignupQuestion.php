<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;

class SignupQuestion extends Resource {
    use FindAll;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'position',
        'field_type',
        'title',
        'required',
        'for_customer',
        'for_student',
        'choices'
    ];

    /**
     * @var string
     */
    protected $endpoint = 'signup_questions';

    /**
     * @var string
     */
    protected $namespace = 'signup_questions';
}
