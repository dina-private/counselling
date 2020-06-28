<?php

/**
 * Class ExampleModel
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class CandidateModel extends Model
{
    public $tableName = 'candidates';

    public function __construct(DBConnection $DBConnection)
    {
        parent::__construct($DBConnection);
    }
}
