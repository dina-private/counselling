<?php

/**
 * Class ExampleModel
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class ExampleModel extends Model
{
    /**
     * getSomething description
     *
     * @param $id
     *
     * @return array
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function getSomething($id)
    {
        $id = $this->escapeString($id);
        $result = $this->query('SELECT * FROM something WHERE id="' . $id . '"');
        return $result;
    }
}
