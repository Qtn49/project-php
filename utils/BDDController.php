<?php


class BDDController
{

    private static $db;

    public function __construct()
    {

        include_once '../model/database.inc.php';

        try {
            self::$db = new PDO("$server:host=$host;dbname=$base", $user, $pass);
        }catch (Exception $e) {
            echo $e;
        }

    }

    /**
     * @return PDO
     */
    public static function getDb()
    {
        return self::$db;
    }

    public static function executeQuery ($query) {

        return self::$db->query($query);

    }

    public static function prepareQuery ($query, array $params) {

        $response = self::$db->prepare($query);
        return $response->execute($params);

    }

    public function prepareQuery ($query, array $params) {

        $response = $this->db->prepare($query);
        return $response->execute($params);

    }

}