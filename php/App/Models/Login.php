<?php

namespace App\Models;

use App\Model;
use Exception;

class Login extends Model
{
    public const TABLE = 'users';
    public $login;
    public $password;
    public $role;


    /**
     * @throws Exception
     */
    public function thisUser($login)
    {

        $user = \App\Models\Login::findByLogin($login);

        $this->login = $user->login;
        $this->password = $user->password;
        $this->role = $user->role;

    }
public function logics(){
    if (isset($this->login)) {
        setcookie('login', $this->role);
    } else {
        setcookie('login', 42);
    }

    if (password_verify($_POST['password'], $this->password)) {
        setcookie('password','true');
        if ($this->role === 'user') {
            header('Location: http://homework.local/start.php');
        }
        if ($this->role === 'admin') {
            header('Location: http://homework.local/templates/admin.php');
        }
    } else {
        setcookie('password',42);
        header('Location: http://homework.local');

    }
}
}

