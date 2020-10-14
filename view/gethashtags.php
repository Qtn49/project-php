<?php
require_once ('../utils/BDDController.php');

$bddController = new BDDController;

$keyword = $_POST['term'];

if (isset($keyword)) {

    $sql="SELECT hashtag FROM Hashtag WHERE hashtag LIKE '%$keyword%'";
    $result = $bddController->executeQuery($sql);

    $json=array();

    foreach ($result as $ligne) {

        array_push($json, $ligne['hashtag']);

    }

    echo json_encode($json);

}

