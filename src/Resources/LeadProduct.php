<?php

namespace Eduframe\Resources;

use Eduframe\Resource;

class LeadProduct extends Resource
{

    /**
     * @var array
     */
    protected $fillable = [
        'catalog_product_id',
        'catalog_variant_id'
    ];

    /**
     * @var string
     */
    protected $endpoint = 'lead_products';

    /**
     * @var string
     */
    protected $model_name = 'LeadProduct';

    /**
     * @var string
     */
    protected $namespace = 'lead_products';
}
