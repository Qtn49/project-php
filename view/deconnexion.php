<?php

session_start();

if (!empty($_SESSION)) {

    session_destroy();
    session_unset();

}

if (isset($_COOKIE['login']))
    setcookie('login', null, time() - 24*3600, null, null, false, true);

if (isset($_COOKIE['password']))
    setcookie('password', null, time() - 24*3600, null, null, false, true);

header('Location: index.php');
