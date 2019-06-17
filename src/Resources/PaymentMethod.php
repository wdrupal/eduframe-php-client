<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;

class PaymentMethod extends Resource
{
    use FindAll;

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'gateway',
    ];

    /**
     * @var string
     */
    protected $endpoint = 'payment_methods';

    /**
     * @var string
     */
    protected $namespace = 'payment_methods';
}
