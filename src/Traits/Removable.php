<?php

namespace Eduframe\Traits;

/**
 * Class Removable
 * @package Eduframe\Traits
 */
trait Removable {
	use BaseTrait;

	/**
	 * @return mixed
	 * @throws \Eduframe\Exceptions\ApiException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function delete() {
		return $this->connection()->delete( $this->getEndpoint() . '/' . urlencode( $this->id ) );
	}
}
