<?php

/**
 * Class DBConnection
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class DBConnection
{

    /**
     * @var false|mysqli
     */
    private $connection;

    /**
     * DBConnection constructor.
     */
    public function __construct()
    {
        $this->connection = mysqli_connect(
            MYSQL_HOST,
            MYSQL_USERNAME,
            MYSQL_PASSWORD,
            MYSQL_DB
        );

        if (!$this->connection) {
            die('MySQL Error: ' . mysqli_connect_error());
        }
    }

    /**
     * getDBConnection description
     *
     * @return false|mysqli
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function getDBConnection()
    {
        return $this->connection;
    }
}
