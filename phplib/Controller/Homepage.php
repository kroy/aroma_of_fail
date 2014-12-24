<?php

class Controller_Homepage extends Controller_Base {
    public function __construct() {
        parent::__construct();
    }

    public function show() {
        self::render('base.php');
    }
}
