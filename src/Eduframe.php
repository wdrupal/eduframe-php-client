<?php

namespace Eduframe;

use Eduframe\Resources\Course;

/**
 * Class Eduframe
 * @package Eduframe
 */
class Eduframe
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
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param array $attributes
     * @return \Eduframe\Resources\Course
     */
    public function course($attributes = [])
    {
        return new Course($this->connection, $attributes);
    }

    /**
     * @return \Eduframe\Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}
