<?php

namespace Eduframe\Traits;

/**
 * Class FindAll
 * @package Eduframe\Traits
 */
trait FindAll
{
    use BaseTrait;

    /**
     * @return mixed
     * @throws \Eduframe\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get() {
        $result = $this->connection()->get($this->getEndpoint());

        return $this->collectionFromResult($result);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws \Eduframe\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all($params = []) {
        $result = $this->connection()->get($this->getEndpoint(), $params, true);

        return $this->collectionFromResult($result);
    }
}
