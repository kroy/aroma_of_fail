<?php
require_once('../phplib/Loader.php');

if (isset($member_name)) {
    // do stuff to display an individual member's page
} else {
    $controller = new Controller_Members();
    $controller->index();
}