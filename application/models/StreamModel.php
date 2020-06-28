<?php

/**
 * Class ExampleModel
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class StreamModel extends Model
{
    public $tableName = 'streams';

    public function __construct(DBConnection $DBConnection)
    {
        parent::__construct($DBConnection);
    }

}
