<?php

/**
 * Class OrganizationModel
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class OrganizationModel extends Model
{
    public $tableName = 'organizations';

    public function __construct(DBConnection $DBConnection)
    {
        parent::__construct($DBConnection);
    }
}
