<?php
require_once __DIR__ . '/vendor/autoload.php';
spl_autoload_register(function ($class) {

    require_once __DIR__  . '/' . str_replace('\\', '/', $class) . '.php';
});