<?php

/**
 * Class Model
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class Model
{
    public $tableName = null;
    /**
     * @var resource
     */
    private $DBConnection;

    /**
     * Model constructor.
     *
     * @param DBConnection $DBConnection
     */
    public function __construct(DBConnection $DBConnection)
    {
        $this->DBConnection = $DBConnection->getDBConnection();
    }

    public function getAll($where = 1)
    {
        return $this->query('SELECT * FROM ' . $this->tableName . ' WHERE ' . $where);
    }

    public function get($where)
    {
        return $this->query('SELECT * FROM ' . $this->tableName . ' WHERE ' . $where . ' LIMIT 1');
    }

    public function delete($where)
    {
        return $this->executeQuery('DELETE FROM ' . $this->tableName . ' WHERE ' . $where);
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
        return mysqli_real_escape_string($this->DBConnection, $string);
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
        } else {
            echo("Could not select the data : " . mysqli_error($this->DBConnection));
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
        return mysqli_query($this->DBConnection, $query);
    }
}
