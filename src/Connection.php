<?php

namespace Eduframe;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Eduframe\Exceptions\ApiException;

/**
 * Class Connection
 * @package Eduframe
 */
class Connection {
	/**
	 * @var string
	 */
	private $apiUrl = 'https://{educator_slug}.eduframe.nl/api/v1';

	/**
	 * @var
	 */
	private $educator_slug;

	/**
	 * @var
	 */
	private $accessToken;

	/**
	 * @var Client
	 */
	private $client;

	/**
	 * @var array Middlewares for the Guzzle 6 client
	 */
	protected $middleWares = [];

	/**
	 * @var bool
	 */
	private $testing = false;

	/**
	 * @return Client
	 */
	private function client() {
		if ( $this->client ) {
			return $this->client;
		}

		$handlerStack = HandlerStack::create();
		foreach ( $this->middleWares as $middleWare ) {
			$handlerStack->push( $middleWare );
		}

		$args = [
			'http_errors' => true,
			'handler'     => $handlerStack,
			'expect'      => false,
		];

		if ( $this->isTesting() ) {
			$args['verify'] = false;
		}

		$this->client = new Client( $args );

		return $this->client;
	}

	/**
	 * Insert a Middleware for the Guzzle Client
	 * @param $middleWare
	 */
	public function insertMiddleWare( $middleWare ) {
		$this->middleWares[] = $middleWare;
	}

	/**
	 * @return Client
	 * @throws ApiException
	 */
	public function connect() {
		// If access token is not set or token has expired, acquire new token
		if ( empty( $this->accessToken ) ) {
			throw new ApiException( 'No access token set.' );
		}

		$client = $this->client();

		return $client;
	}

	/**
	 * @param string $method
	 * @param string $endpoint
	 * @param null $body
	 * @param array $params
	 * @param array $headers
	 * @return \GuzzleHttp\Psr7\Request
	 * @throws \Eduframe\Exceptions\ApiException
	 */
	private function createRequest( $method = 'GET', $endpoint, $body = null, array $params = [], array $headers = [] ) {
		// Add default json headers to the request
		$headers = array_merge( $headers, [
			'Accept' => 'application/json',
			// 'Content-type' => 'application/json'
		] );

		// If access token is not set or token has expired, acquire new token
		if ( empty( $this->accessToken ) ) {
			throw new ApiException( 'No access token set.' );
		}

		// If we have a token, sign the request
		if ( ! empty( $this->accessToken ) ) {
			$headers['Authorization'] = 'Bearer ' . $this->accessToken;
		}

		// Create param string
		if ( ! empty( $params ) ) {
			$endpoint .= '?' . http_build_query( $params );
		}

		// Create the request
		$request = new Request( $method, $endpoint, $headers, $body );

		return $request;
	}

	/**
	 * @param string $method
	 * @param $endpoint
	 * @param null $body
	 * @param array $params
	 * @param array $headers
	 * @return \GuzzleHttp\Psr7\Request
	 * @throws \Eduframe\Exceptions\ApiException
	 */
	private function createRequestNoJson( $method = 'GET', $endpoint, $body = null, array $params = [], array $headers = [] ) {
		// Add default json headers to the request
		$headers = array_merge( $headers, [
			'Content-type' => 'application/x-www-form-urlencoded'
		] );

		// If access token is not set or token has expired, acquire new token
		if ( empty( $this->accessToken ) ) {
			throw new ApiException( 'No access token set.' );
		}
		// If we have a token, sign the request
		if ( ! empty( $this->accessToken ) ) {
			$headers['Authorization'] = 'Bearer ' . $this->accessToken;
		}
		// Create param string
		if ( ! empty( $params ) ) {
			$endpoint .= '?' . http_build_query( $params );
		}
		// Create the request
		$request = new Request( $method, $endpoint, $headers, $body );

		return $request;
	}

	/**
	 * @param string $url
	 * @param array $params
	 * @param bool $fetchAll
	 * @return mixed
	 * @throws ApiException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function get( $url, array $params = [], $fetchAll = false ) {
		try {
			$request  = $this->createRequest( 'GET', $this->formatUrl( $url, 'get' ), null, $params );
			$response = $this->client()->send( $request );

			$json = $this->parseResponse( $response );

			if ( $fetchAll === true ) {
				if ( $nextParams = $this->getNextParams( $response->getHeaderLine( 'Link' ) ) ) {
					$json = array_merge( $json, $this->get( $url, $nextParams, $fetchAll ) );
				}
			}

			return $json;
		} catch ( Exception $e ) {
			throw $this->parseExceptionForErrorMessages( $e );
		}
	}

	/**
	 * @param string $url
	 * @param string $body
	 * @return mixed
	 * @throws ApiException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function post( $url, $body ) {
		try {
			$request = $this->createRequestNoJson( 'POST', $this->formatUrl( $url, 'post' ), $body );


			$response = $this->client()->send( $request );

			return $this->parseResponse( $response );
		} catch ( Exception $e ) {
			throw $this->parseExceptionForErrorMessages( $e );
		}
	}

	/**
	 * @param string $url
	 * @param string $body
	 * @return mixed
	 * @throws ApiException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function patch( $url, $body ) {
		try {
			$request  = $this->createRequestNoJson( 'PATCH', $this->formatUrl( $url, 'patch' ), $body );
			$response = $this->client()->send( $request );

			return $this->parseResponse( $response );
		} catch ( Exception $e ) {
			throw $this->parseExceptionForErrorMessages( $e );
		}
	}

	/**
	 * @param string $url
	 * @param string $body
	 * @return mixed
	 * @throws ApiException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function delete( $url, $body = null ) {
		try {
			$request  = $this->createRequestNoJson( 'DELETE', $this->formatUrl( $url, 'delete' ), $body );
			$response = $this->client()->send( $request );

			return $this->parseResponse( $response );
		} catch ( Exception $e ) {
			throw $this->parseExceptionForErrorMessages( $e );
		}
	}

	/**
	 * @param string $url
	 * @param array $options
	 * @return mixed
	 * @throws ApiException
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function upload( $url, $options ) {
		try {
			$request = $this->createRequestNoJson( 'POST', $this->formatUrl( $url, 'post' ), null );

			$response = $this->client()->send( $request, $options );

			return $this->parseResponse( $response );
		} catch ( Exception $e ) {
			$this->parseExceptionForErrorMessages( $e );
		}
	}

	/**
	 * @param mixed $educator_slug
	 */
	public function setEducatorSlug( $educator_slug ) {
		$this->educator_slug = $educator_slug;
	}

	/**
	 * @param mixed $accessToken
	 */
	public function setAccessToken( $accessToken ) {
		$this->accessToken = $accessToken;
	}

	/**
	 * @param Response $response
	 * @return mixed
	 * @throws ApiException
	 */
	private function parseResponse( Response $response ) {
		try {
			Psr7\rewind_body( $response );
			$json = json_decode( $response->getBody()->getContents(), true );

			return $json;
		} catch ( \RuntimeException $e ) {
			throw new ApiException( $e->getMessage() );
		}
	}

	/**
	 * @param $headerLine
	 * @return bool | array
	 */
	private function getNextParams( $headerLine ) {
		$links = Psr7\parse_header( $headerLine );

		foreach ( $links as $link ) {
			if ( isset( $link['rel'] ) && $link['rel'] === 'next' ) {
				$query = parse_url( trim( $link[0], '<>' ), PHP_URL_QUERY );
				parse_str( $query, $params );

				return $params;
			}
		}

		return false;
	}

	/**
	 * @return mixed
	 */
	public function getAccessToken() {
		return $this->accessToken;
	}

	/**
	 * Parse the response in the Exception to return the Exact error messages.
	 * @param Exception $exception
	 * @return \Eduframe\Exceptions\ApiException
	 */
	private function parseExceptionForErrorMessages( Exception $exception ) {
		if ( ! $exception instanceof BadResponseException ) {
			return new ApiException( $exception->getMessage(), 0, $exception );
		}

		$response = $exception->getResponse();

		if ( null === $response ) {
			return new ApiException( 'Response is NULL.', 0, $exception );
		}

		Psr7\rewind_body( $response );
		$responseBody        = $response->getBody()->getContents();
		$decodedResponseBody = json_decode( $responseBody, true );

		if ( null !== $decodedResponseBody && isset( $decodedResponseBody['error']['message']['value'] ) ) {
			$errorMessage = $decodedResponseBody['error']['message']['value'];
		} else {
			$errorMessage = $responseBody;
		}

		return new ApiException( 'Error ' . $response->getStatusCode() . ': ' . $errorMessage, $response->getStatusCode(), $exception );
	}

	/**
	 * @param string $url
	 * @param string $method
	 * @return string
	 */
	private function formatUrl( $url, $method = 'get' ) {
		if ( $this->testing ) {
			return 'http://' . $this->educator_slug . '.testing.edufra.me/api/v1' . '/' . $url;
		}

		return str_replace( '{educator_slug}', $this->educator_slug, $this->apiUrl ) . '/' . $url;
	}

	/**
	 * @return bool
	 */
	public function isTesting() {
		return $this->testing;
	}

	/**
	 * @param bool $testing
	 */
	public function setTesting( $testing ) {
		$this->testing = $testing;
	}
}
