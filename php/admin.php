<?php
require __DIR__ . '/autoload.php';
$ctrl = new \App\Controllers\AdminController();
try {
    $ctrl();
} catch (\App\DbException $e) {

    die('Ошибка: ' . $e->getMessage());
}


header("Location: http://homework.local/templates/admin.php");