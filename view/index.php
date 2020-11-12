<?php

include_once "../utils/BDDController.php";

session_start();

if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

    setcookie('login', $_SESSION['login'], time() + 365*24*3600, null, null, false, true);
    setcookie('password', $_SESSION['password'], time() + 365*24*3600, null, null, false, true);

}


?>
<!Doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Le super blog</title>
    <?php

    include_once 'style_import.php';

    ?>
</head>
<body>

<?php

include 'header.php';

?>

<div class="article-container">

    <?php

    $bdd = BDDController::getInstance();

    $query = $bdd->prepare("SELECT * FROM Article WHERE  mode_arti != 'brouillon'");
    $query->execute(array());
    $reponse = $query->fetchAll();

    foreach ($reponse as $item) {
        ?>

        <article>
            <h1><?php echo $item['titre_arti']; ?> <em>créé le <?php echo $item['date_arti']; ?></em></h1>
            <p><?php echo $item['texte_arti']; ?></p>
        </article>

        <?php
    }

    ?>

</div>

<?php

include 'footer.php';

include 'script_import.php';

?>

</body>
</html>

