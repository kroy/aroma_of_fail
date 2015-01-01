<?php

class Controller_Members extends Controller_Base {

    public function index() {
        $tpl = new View_Members_Index();
        $tpl->render();
    }
}