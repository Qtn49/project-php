<?php
require_once('../utils/Database.php');

$bddController = Database::getInstance();

$keyword = $_POST['term'];

if (isset($keyword)) {

    $sql="SELECT hashtag FROM Hashtag WHERE hashtag LIKE '%$keyword%'";
    $result = $bddController->query($sql);

    $json=array();

    foreach ($result as $ligne) {

        array_push($json, $ligne['hashtag']);

    }

    echo json_encode($json);

}

