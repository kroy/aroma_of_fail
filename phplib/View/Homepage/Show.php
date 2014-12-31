<?php

class View_Homepage_Show extends View_Base {
    public function __construct() {
        parent::__construct();
        $this->title = "Home";
        $this->setBodyTpl(self::TPL_PATH . 'homepage/show.php');
    }
}