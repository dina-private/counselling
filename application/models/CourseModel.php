<?php

/**
 * Class ExampleModel
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class CourseModel extends Model
{
    public $tableName = 'courses';

    public function __construct(DBConnection $DBConnection)
    {
        parent::__construct($DBConnection);
    }
}
