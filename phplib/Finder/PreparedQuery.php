<?php

class Finder_PreparedQuery {
    // result types
    const RESULT_TYPE_MANY = 'many';
    const RESULT_TYPE_SINGLE = 'single';
    const RESULT_TYPE_COUNT = 'count';
    const RESULT_TYPE_NONE = 'none';


    // PDOStatement at the heart of the class
    private $prepared_query;

    private $query_name;
    private $result_type;
    private $expected_params;

    public function __construct($query_name, $prepared_query, $result_type = null, $expected_params = null) {
        $this->$query_name = $query_name;
        $this->prepared_query = $prepared_query;
        $this->result_type = $result_type;
        $this->expected_params = $expected_params;
    }

    /**
     * Validates provided params and calls execute on the prepared stmt
     * @param array params to the prepared query
     * @return bool whether the query was successful or not
     * @todo actually validate
     */
    public function execute($params) {
        return $this->prepared_query->execute($params);
    }

    /**
     * Fetches all results from the prepared stmt
     * @return array|false an array of all results or false if fetching failed
     */
    public function fetchAll() {
        return $this->prepared_query->fetchAll();
    }

    public function setResultType($result_type) {
        if (
            $result_type == self::RESULT_TYPE_MANY
            || $result_type == self::RESULT_TYPE_SINGLE
            || $result_type == self::RESULT_TYPE_COUNT
            || $result_type == self::RESULT_TYPE_NONE
            )
        {
            $this->result_type = $result_type;
        }
    }

    public function setExpectedParams($expected_params) {
        $this->expected_params = $expected_params;
    }
}