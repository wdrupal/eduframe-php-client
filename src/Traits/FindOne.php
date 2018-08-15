<?php

namespace Eduframe\Traits;

/**
 * Class FindOne
 * @package Eduframe\Traits
 */
trait FindOne {
    use BaseTrait;

    /**
     * @param string|int $id
     *
     * @param array $params
     * @return mixed
     *
     * @throws \Eduframe\Exceptions\ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function find($id, $params = [])
    {
        $result = $this->connection()->get($this->getEndpoint() . '/' . urlencode($id), $params);
        return $this->makeFromResponse($result);
    }
}
