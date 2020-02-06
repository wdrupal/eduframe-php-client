<?php

namespace Eduframe\Resources;

use Eduframe\Resource;
use Eduframe\Traits\FindAll;
use Eduframe\Traits\FindOne;

class Label extends Resource {
    use FindAll, FindOne;

    protected $fillable = [
        'id',
        'name',
        'color',
        'model_type',
        'updated_at',
        'created_at'
    ];

    /**
     * @var string
     */
    protected $model_name = 'Labels';

    /**
     * @var string
     */
    protected $endpoint = 'labels';

    /**
     * @var string
     */
    protected $namespace = 'label';
}
