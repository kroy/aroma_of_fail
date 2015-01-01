<?php

class View_Members_Index extends View_Base {
    const TPL_SUBDIR = 'members/';
    const TPL_NAME = 'index.php';

    public function __construct() {
        $this->title = 'Members';
        $this->setBodyTpl(self::TPL_PATH . self::TPL_SUBDIR . self::TPL_NAME);
    }
}