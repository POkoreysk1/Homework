<?php

namespace App;

use App\Models\Article;
use App\Models\Author;
use mysql_xdevapi\Exception;

abstract class  Model
{
    public int $id;

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT *  FROM ' . static::TABLE;
        return $db->queryEach($sql, static::class, []);


    }


    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
        $result = $db->queryEach($sql, static::class, ['id' => $id]);
        if ($result === false) {
            return null;
        }
        return $result[0];
    }

    public static function findByLogin($login)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE login = :login';
        $result = $db->query($sql, static::class, ['login' => $login]);
        if ($result === false) {
            return null;
        }

        if (empty($result)) {
            throw new DbException('Вы не авторизованный пользователь!');
        } else {
            return $result[0];
        }
    }


    public static function findLastThreeNews()
    {
        $db = new Db();
        $sql = 'SELECT *  FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT 3 ';
        return ((array)$db->queryEach($sql, static::class, []));

    }

    public function insert()
    {
        $filds = get_object_vars($this);
        $cols = [];
        $data = [];
        foreach ($filds as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols [] = $name;
            $data [':' . $name] = $value;
        }
        $sql = 'INSERT INTO ' . static::TABLE . ' 
        ( ' . implode(',', $cols) . ') VALUES 
        (' . implode(',', array_keys($data)) . ')';
        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->getLastId();


    }

    public function update($id)
    {

        $db = new Db();
        $filds = get_object_vars($this);
        $filds['id'] = $id;

        $request = [];
        foreach ($filds as $name => $value) {
            if ($name == 'id')
                continue;
            $request[] = "$name = '$value'";
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(',', $request) . ' WHERE id = :id';

        $db->execute($sql, [':id' => $id]);


    }

    public function save($id)
    {
        $db = new Db();
        $news = self::findById($id);

        if (empty($news->id)) {
            $this->insert();
        } else {
            $this->update($id);
        }

    }

    /**
     * @throws DbException
     */
    public function delete(int $id)
    {

        $db = new Db();
        $news = self::findById($id);
        if (null === $news) {
            throw new DbException('не получилось удалить запись');
        }
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = ' . $id;
        $db->execute($sql);
    }


}