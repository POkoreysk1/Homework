<?php
require __DIR__ . '/autoload.php';

$ctrl = $_GET['ctrl'] ?? 'IndexController';
$class = 'App\Controllers\\'. $ctrl;
try {

    $ctrl = new $class;
    $ctrl();

}
catch (\App\DbException $error)
{
    echo 'Ошибка в БД: ' . $error->getMessage();
    die();
}


