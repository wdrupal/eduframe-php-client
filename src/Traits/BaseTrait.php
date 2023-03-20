<?php

namespace Eduframe\Traits;

trait BaseTrait
{

    /**
     * @return \Eduframe\Connection
     * @see \Eduframe\Model::connection()
     */
    abstract protected function connection();

    /**
     * @return string
     * @see \Eduframe\Model::getEndpoint()
     */
    abstract protected function getEndpoint();

    /**
     * @param array $result
     * @return array
     * @see \Eduframe\Model::collectionFromResult()
     */
    abstract protected function collectionFromResult(array $result);

    /**
     * Create a new object with the response from the API
     * @param $response
     * @return static
     * @see \Eduframe\Model::makeFromResponse()
     */
    abstract protected function makeFromResponse(array $response);
}
