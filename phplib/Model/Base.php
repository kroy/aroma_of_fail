<?php

class Model_Base {
    const TYPE_INT = 'int';
    const TYPE_STRING = 'string';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_EPOCH = 'epoch';

    // all of the fields that this model has, mapped to the field's type
    protected static $field_map = [];

    // the value of each field
    protected $fields = [];

    /**
     * Constructor for model classes
     * @todo allow passing of partial object array to constructor
     * @todo validation at some point during the construction of the model
     */
    public function __construct() {
        foreach (static::$field_map as $field) {
            $this->__set($field, null);
        }
    }

    /**
     * Magic setter method to facilitate magic
     * @todo validation on field type
     */
    public function __set($field_name, $value) {
        if (isset(static::$field_map[$field_name])) {
            $this->fields[$field_name] = $value;
        }
    }

    /**
     * Magic getter method to facilitate magic
     * @return mixed
     */
    public function __get($field_name) {
        return $this->$fields[$field_name];
    }

    /**
     * Get this model's field map, for reference
     * @return array
     */
    public function getFieldMap() {
        return static::$field_map;
    }

    /**
     * Get this model's fields
     * @return array
     */
    public function getFields() {
        return array_keys(static::$field_map);
    }
}