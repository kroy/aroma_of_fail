<?php

class Controller_Base {
    const TPL_PATH = "../template/";

    public function __construct() {
        if (Config::isDevelopment()) {
            ini_set('display_errors', 1);
            error_reporting(~0);
        }
    }

    protected function render($tpl_name) {
        require_once(self::TPL_PATH . $tpl_name);
    }
}