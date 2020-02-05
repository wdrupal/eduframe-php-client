<?php

namespace Eduframe\Resources;

use Eduframe\Resource;

class SignupAnswer extends Resource {

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'signup_question_id',
        'value'
    ];

    /**
     * @var string
     */
    protected $endpoint = 'signup_answers';

    /**
     * @var string
     */
    protected $namespace = 'signup_answers';
}
