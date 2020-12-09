<?php

session_start();
include_once '../model/User.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <?php

    include_once 'style_import.php';

    ?>
</head>
<body>

<?php

include_once 'header.php';

?>

<div class="grid-container">
    <div class="cadre-connexion">

        <form method="post">

            <label for="mail">Identifiant :</label><br>
            <input type="email" id="mail" name="mail" size="30"><br>

            <label for="mdp">Mot de passe :</label><br>
            <input type="password" id="mdp" name="mdp" size="30" /><br>
<!--            <div class="invalid-feedback">Le mot de passe est incorrect, la connexion n'a pas pu être établie</div>-->

            <p><a href="inscription.php">S'inscrire</a></p>

            <button type="submit">Valider</button>
            <button type="button" onclick="window.location.href = 'index.php';">Annuler</button>

        </form>

    </div>
</div>

<?php

include_once 'script_import.php';

if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {

    $user = User::getAuth($_COOKIE['login'], $_COOKIE['password']);
    $user->setSession();

    if (!is_null($user))
        header('Location: index.php');

}

if (!empty($_POST)) {

    $user = User::getAuth($_POST['mail'], $_POST['mdp']);

    if (!is_null($user)) {
        $user->setSession();
        header('Location: index.php');
    }
}

include_once 'footer.php';

?>

</body>
</html>