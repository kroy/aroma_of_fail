<?php

abstract class Finder_Base {

    // the php database object that the finder uses to talk to the db
    protected $pdo;

    protected $model_class;

    public function __construct() {
        $this->pdo = Db::getPdo();
        $this->setUp();
    }

    /**
     * Takes a pdo result array and turns it into a model object
     * @param $raw_result assoc array containing the model's fields
     * @return Model_Base of the correct class
     */
    protected function hydrateModel($raw_result) {
        $model = new $this->model_class;
        foreach ($raw_result as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }

    /**
     * Build the managed queries the Finder will use
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