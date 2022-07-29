
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="../admin.php">
    Введите ID статьи:
    <input type="number" name="id">
    Редактировать название статьи:
    <input type="text" name="title" required>
    Редактировать содержание статьи:
    <input type="text" name="content" required>
    Редактировать автора статьи:
    <input type="number" name="authorId" required>
    <br>
    <button type="submit" name="save">SAVE</button>
    <button type="submit" name="delete">DELETE</button>

</form>
</body>
</html>
<?php
