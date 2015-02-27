<?php

class Finder_Member extends Finder_Base {
    protected $model_class = 'Model_Member';
    protected $table = 'members';

    protected function setUp() {
        $query = "SELECT * FROM {$this->table} WHERE id=?";
        $this->prepareQuery('find', $query);
    }

    public function find($pk) {
        $results = $this->executeQuery('find', [$pk]);
        if ($results) {
            return $this->hydrateModel($results[0]);
        }
        return null;
    }

    public function findMany(array $pks) {
        // todo
    }
}