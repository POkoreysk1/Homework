<form action="login.php" method="post">
    <b>
        Введите логин:<input type="text" name="login">
    </b>
    <b>
        Ведите пароль:<input type="password" name="password">
    </b>
    <b>
        <button type="submit">Войти</button>
    </b>
</form>
<?php
if (!empty($_COOKIE)){
    if (($_COOKIE['password'] == 42) || ($_COOKIE['login'] == 42)) {
        echo 'Неверный логин или пароль' . "\n";

    }
}


