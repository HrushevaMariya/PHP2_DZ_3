<?php

class DB
{
    private static $instance;
    private static $config = [
        'host' => 'localhost',
        'user' => 'root',
        'pwd' => '1234',
        'db' => 'dz_3',];

    private $link;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getTableData($tableName)
    {
        try {
            return $this->link
                ->query("SELECT * FROM{$tableName}")
                ->fetch_all(MYSQLT_ASSOC);
        } catch (Throwable $e) {
            return null;
        }
    }

    public function getById($tableName, $id)
    {
        try {
            return $this->link
                ->query("SELECT*FROM{$tableName}WHERE id = " . (int)id)
                ->fetch_assoc();
        } catch (Throwable $e) {
            return null;
        }
    }

    private function __construct()
    {
        $this->link = mysqli_connect(
            self::$config['host'],
            self::$config['user'],
            self::$config['pwd'],
            self::$config['db'],
        );
        if ($this->link === false) {
            die('Cant connect to DB');
        }
    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }

}
