<?php

/**
 * Class OrganizationModel
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class StateModel extends Model
{
    public $tableName = 'states';

    public function __construct(DBConnection $DBConnection)
    {
        parent::__construct($DBConnection);
    }

}
