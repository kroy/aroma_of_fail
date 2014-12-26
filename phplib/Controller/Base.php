<?php

class Controller_Base {
    public function __construct() {
        if (Config::isDevelopment()) {
            ini_set('display_errors', 1);
            error_reporting(~0);
        }
    }

    // Maybe provide abstract action methods
}