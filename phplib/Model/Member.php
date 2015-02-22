<?php

class Model_Member extends Model_Base {
    const TABLE_NAME = 'members';

    protected static $field_map = [
        'id' => self::TYPE_INT,
        'nickname' => self::TYPE_STRING,
        'title' => self::TYPE_INT,
    ];

}