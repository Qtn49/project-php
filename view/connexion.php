<?php

session_start();
include_once '../model/User.php';

$user = new User;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.php">
</head>
<body>

<div class="grid-container">
    <div class="cadre-connexion">

        <form method="post">

            <label for="mail">Identifiant :</label><br>
            <input type="email" id="mail" name="mail" size="30"><br>

            <label for="mdp">Mot de passe :</label><br>
            <input type="password" id="mdp" size="30" /><br>
<!--            <div class="invalid-feedback">Le mot de passe est incorrect, la connexion n'a pas pu être établie</div>-->

            <button type="submit">Valider</button>
            <button type="button" onclick="window.location.href = 'index.php';">Annuler</button>

        </form>

    </div>
</div>

<?php

include_once 'script_import.php';

if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {

    if ($user->getAuth($_COOKIE['login'], $_COOKIE['password'])) {
//        header('Location: index.php');
    }

}

if (!empty($_POST)) {

    if ($user->getAuth(htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['mdp']))) {

//        header('Location: index.php');
//        exit();

    }

}

?>

</body>
</html>