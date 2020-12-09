<?php

session_start();

if (!empty($_SESSION)) {

    session_destroy();
    session_unset();

}

header('Location: index.php');
