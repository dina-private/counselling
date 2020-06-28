<?php

/**
 * Class ExampleModel
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class User extends Model
{
    public $tableName = 'users';

    public function __construct(DBConnection $DBConnection)
    {
        parent::__construct($DBConnection);
    }

    public function checkUserForLogin($userName, $password)
    {
        $password = md5($password);
        return $this->query('SELECT * FROM ' . $this->tableName . ' WHERE username ="' . $userName . '" AND password="' . $password . '" LIMIT 1');
    }
}
