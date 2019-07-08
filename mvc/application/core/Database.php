<?php

class Database extends PDO
{
    public function __construct()
    {
        $dsn = 'mysql:dbname=vs_mvc;host=127.0.0.1';
        $user = 'root';
        $password = '';
        try {
            parent::__construct($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Подключение не удалось:' . $e->getMessage();
        }
    }
}

