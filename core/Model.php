<?php

/**
 * Class Model
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class Model
{

    /**
     * @var resource
     */
    private $connection;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        global $config;
        $this->connection = mysqli_connect(
            $config['db_host'],
            $config['db_username'],
            $config['db_password'],
            $config['db_password']
        );

        if (!$this->connection) {
            die('MySQL Error: ' . mysqli_connect_error());
        }
    }

    /**
     * escapeString description
     *
     * @param $string
     *
     * @return string
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function escapeString($string)
    {
        return mysqli_real_escape_string($this->connection, $string);
    }

    /**
     * escapeArray description
     *
     * @param $array
     *
     * @return mixed
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function escapeArray($array)
    {
        foreach ($array as &$value) {
            $value = $this->escapeString($value);
        }
        return $array;
    }

    /**
     * query description
     *
     * @param $query
     *
     * @return array
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function query($query)
    {
        $data = [];

        $result = $this->executeQuery($query);

        if ($result) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /**
     * executeQuery description
     *
     * @param $query
     *
     * @return bool|mysqli_result
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function executeQuery($query)
    {
        return mysqli_query($this->connection, $query);
    }
}
