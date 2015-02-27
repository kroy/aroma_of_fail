<?php

abstract class Finder_Base {
    // the class of the corresponding model. Necessary for hydration
    protected $model_class;

    // the table this Finder will be querying
    protected $table;

    // the php database object that the finder uses to talk to the db
    protected $pdo;

    // the prepared queries this finder has available
    protected $prepared_queries;

    public function __construct() {
        $this->pdo = Db::getPdo();
        $this->setUp();
    }

    /**
     * Takes a pdo result array and turns it into a model object
     * @param $raw_result assoc array containing the model's fields
     * @return Model_Base of the correct class
     */
    protected function hydrateModel(array $raw_result) {
        $model = new $this->model_class;
        foreach ($raw_result as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }

    /**
     * Creates a prepared query for the finder to execute
     * @param $query_name String the name of the query
     * @param $query String a string of PDO SQL to call when executed
     * @return Finder_Statement|null
     * @todo use a wrapper to represent prepared queries so we can track certain things
     */
    protected function prepareQuery($query_name, $query) {
        $prepared_query = $this->pdo->prepare($query);
        if ($prepared_query) {
            $query_object = new Finder_PreparedQuery($query_name, $prepared_query);
            $this->prepared_queries[$query_name] = $query_object;
        }

        // if we try to prepare a query with the same name twice, and the
        // second prepared_query is invalid, this will return the first,
        // valid prepared_query
        return $this->prepared_queries[$query_name];
    }

    /**
     * Execute a query with the given name and return the result set
     * @param query_name String the name of the query to execute
     * @param params the parameters to the query to be executed
     * @return array|null the raw results of the query
     * @todo validate that the # of params is correct
     * @todo better error/no-result handling
     * @todo make this public?
     */
    protected function executeQuery($query_name, array $params = []) {
        $query = $this->prepared_queries[$query_name];
        if (!$query) {
            return null;
        }
        if($query->execute($params)) {
            return $query->fetchAll();
        }

        return null;
    }

    /**
     * Build the prepared queries the Finder will use
     */
    protected abstract function setUp();

    /**
     * Find by a record by primary key
     * @param $pk the primary key of the record. Can be an array or single field
     * @return Model_Base
     */
    public abstract function find($pk);

    /**
     * Find all records with the provided primary keys
     * @param $pks an array of the primary keys of the records to find.
     * @return array[Model_Base]
     */
    public abstract function findMany(array $pks);
}