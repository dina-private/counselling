<?php

/**
 * Class ExampleModel
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class ExampleModel extends Model
{
    public function __construct(DBConnection $DBConnection)
    {
        parent::__construct($DBConnection);
    }

    /**
     * getSomething description
     *
     * @return array
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function getSomething()
    {
        $result = $this->query('SELECT * FROM user_management_mapping LIMIT 10');
        return $result;
    }
}
