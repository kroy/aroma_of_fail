<?php

/**
 * Loads php classes instantiated within phplib.
 *
 * Sample_Class_Name => /phplib/Sample/Class/Name.php
 *
 */
spl_autoload_register(function($class) {
    $class = preg_replace('/^(Finder)(_.+)/', "Model$2", $class);
    $class = str_replace('_', '/', $class) . '.php';
    require_once($class);
});
