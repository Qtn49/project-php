<?php


class BDDController
{

    private $db;

    public function __construct()
    {

        include_once '../model/database.inc.php';

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

    public function executeQuery ($query) {

        return $this->db->query($query);

    }

    public function prepareQuery ($query, array $params) {

        $response = $this->db->prepare($query);
        $result = $response->execute($params);

        print_r($params);

        return $result;

    }

}