<?php

class Controller_Base {
    const TPL_PATH = "/../phplib/template/";
    const TEMPLATE_PATH = "../template/";


    public function __construct() {
    }

    protected function render($tpl_name) {
        require_once(self::TEMPLATE_PATH . $tpl_name);
    }
}