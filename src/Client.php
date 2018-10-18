<?php

namespace Eduframe;

use Eduframe\Resources\Address;
use Eduframe\Resources\Course;
use Eduframe\Resources\Customer;
use Eduframe\Resources\CustomerEnrollment;
use Eduframe\Resources\Enrollment;
use Eduframe\Resources\Meeting;
use Eduframe\Resources\PlannedCourse;
use Eduframe\Resources\Teacher;


/**
 * Class Eduframe
 * @package Eduframe
 */
class Client
{
    /**
     * The HTTP connection
     *
     * @var \Eduframe\Connection
     */
    protected $connection;

    /**
     * Eduframe constructor.
     * @param \Eduframe\Connection $connection
     */
    public function __construct(String $educator_slug, String $access_token)
    {
	    $connection = new Connection();

	    $connection->setAccessToken( $access_token );
	    $connection->setEducatorSlug( $educator_slug );

	    try {
		    $connection->connect();

		    return new Client( $connection );
	    } catch
	    ( \Exception $e ) {
		    throw new Exception( 'Could not connect to Eduframe: ' . $e->getMessage() );
	    }
    }

    /**
     * @param array $attributes
     * @return \Eduframe\Resources\Address
     */
    public function addresses($attributes = [])
    {
        return new Address($this->connection, $attributes);
    }

    /**
     * @param array $attributes
     * @return \Eduframe\Resources\Course
     */
    public function courses($attributes = [])
    {
        return new Course($this->connection, $attributes);
    }

    /**
     * @param array $attributes
     * @return \Eduframe\Resources\Customer
     */
    public function customers($attributes = [])
    {
        return new Customer($this->connection, $attributes);
    }

    /**
     * @param array $attributes
     * @return \Eduframe\Resources\CustomerEnrollment
     */
    public function customer_enrollments($attributes = [])
    {
        return new CustomerEnrollment($this->connection, $attributes);
    }

    /**
     * @param array $attributes
     * @return \Eduframe\Resources\Enrollment
     */
    public function enrollments($attributes = [])
    {
        return new Enrollment($this->connection, $attributes);
    }

    /**
     * @param array $attributes
     * @return \Eduframe\Resources\Meeting
     */
    public function meetings($attributes = [])
    {
        return new Meeting($this->connection, $attributes);
    }

    /**
     * @param array $attributes
     * @return \Eduframe\Resources\PlannedCourse
     */
    public function planned_courses($attributes = [])
    {
        return new PlannedCourse($this->connection, $attributes);
    }

    /**
     * @param array $attributes
     * @return \Eduframe\Resources\Teacher
     */
    public function teachers($attributes = [])
    {
        return new Teacher($this->connection, $attributes);
    }


    /**
     * @return \Eduframe\Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}
