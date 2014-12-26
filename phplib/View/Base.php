<?php

class View_Base {
    const BASE_TPL_PATH = "../template/base.php";

    protected $title;
    protected $body;

    public function __construct($body = null) {

    }

    public function render() {
        require_once(self::BASE_TPL_PATH);
    }

    protected function setBody($body) {
        $this->body = $body;
    }
}