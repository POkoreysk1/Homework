<?php

use App\Models\Login;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/autoload.php';


$user = new Login();
try {
    $user->thisUser($_POST['login']);
} catch (\App\DbException $e) {
    header('Location: http://homework.local');

}
$user->logics();




