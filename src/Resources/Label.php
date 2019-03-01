<?php
/**
 * Created by PhpStorm.
 * User: 363690
 * Date: 27/02/2019
 * Time: 14:32
 */

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
        'model_type'
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
