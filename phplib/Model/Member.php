<?php

class Model_Member extends Model_Base {
    const TABLE_NAME = 'members';

    protected static $field_map = [
        'id'        => self::TYPE_INT,
        'nickname'  => self::TYPE_STRING,
        'title'     => self::TYPE_STRING,
    ];

    private static $finder;

    /**
     * Returns a finder object for this model to facilitate translation
     * between the DB and models
     * @return Finder
     */
    public static function getFinder() {
        if (!isset(self::$finder)) {
            self::$finder = new Finder_Member();
        }

        return self::$finder;
    }

}