<?php


class Database
{

    private static $_instance;
    private $db;

    private function __construct()
    {

        include_once '../model/data.inc.php';

        self::$_instance = $this;

        try {
            $this->db = new PDO("$server:host=$host;dbname=$base", $user, $pass);
        }catch (Exception $e) {
            echo $e;
        }

    }

    /**
     * @return PDO
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @return Database
     */
    public static function getInstance()
    {

        if (is_null(self::$_instance))
            self::$_instance = new Database;

        return self::$_instance;
    }

    public function __call($name, $arguments)
    {

        return call_user_func_array(array($this->db, $name), $arguments);

    }

}