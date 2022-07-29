<?php

namespace App;

use App\Models\Article;

class Db
{
    protected $dbh;

    /**
     * @throws DbException
     */
    public function __construct()
    {
        $config = new Config();
        $configData = $config->getConfigData();

        try {
            $this->dbh = new \PDO(
                'mysql:host=' . $configData['host'] .
                ';dbname=' . $configData['dbname'],
                $configData['user'],
                $configData['password']
            );
        } catch (\PDOException $e) {
            throw new DbException('ошибка подключения к БД. Error: ' . $e->getMessage());
        }

    }


    public function query($sql, $class, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (!$res) {
            throw new DbException('Запрос не может быть выполнен');
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function queryEach($sql, $class, $data)
    {
        $array = [];
        $sth = $this->dbh->prepare($sql);
        $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        $res = $sth->execute($data);
        if (!$res) {
            throw new DbException('Запрос не может быть выполнен');
        }

        $count = $sth->rowCount();
        for ($i = 0; $i <= $count; $i++) {
            $array[] = $sth->fetch(\PDO::FETCH_CLASS, \PDO::FETCH_ORI_NEXT, \PDO::FETCH_ORI_REL);
        }

        return $array;


    }


    public function execute($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }
}
