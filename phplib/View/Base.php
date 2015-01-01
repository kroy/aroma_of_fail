<?php

class View_Base {
    const BASE_TPL_PATH = "../template/base.php";
    const TPL_PATH = "../template/";

    protected $title;
    protected $body_tpl;
    protected $tpl_vars = [];

    public function render() {
        $body_tpl = $this->body_tpl;
        $title = $this->title;
        // unpackage the template vars
        foreach ($this->tpl_vars as $key => $value) {
            $$key = $value;
        }
        require_once(self::BASE_TPL_PATH);
    }

    public function assign($key, $value) {
        $this->tpl_vars[$key] = $value;
    }

    protected function setBodyTpl($body_tpl) {
        $this->body_tpl = $body_tpl;
    }
}