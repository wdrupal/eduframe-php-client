<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;

class PaymentOption extends Resource
{
    use FindAll;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'extra_cost',
        'percentage',
        'multiplier',
    ];

    /**
     * @var string
     */
    protected $endpoint = 'payment_options';

    /**
     * @var string
     */
    protected $namespace = 'payment_options';
}
