<?php

include_once "../utils/BDDController.php";

session_start();

if (isset($_SESSION['mail']) && isset($_SESSION['password'])) {

    setcookie('mail', $_SESSION['mail'], time() + 7*24*3600, null, null, false, true);
    setcookie('password', $_SESSION['password'], time() + 7*24*3600, null, null, false, true);

}

//print_r($_SESSION);
//print_r($_COOKIE);

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

    $query = $bdd->prepare("SELECT * FROM Article");
    $query->execute(array());
    $reponse = $query->fetchAll();

    foreach ($reponse as $item) {

        if ($item['mode_arti'] != "brouillon" || isset($_SESSION['id']) && $item['id_uti'] == $_SESSION['id']) {

        ?>

        <article articleId="<?php echo $item['id_arti']; ?>">
            <h1><?php echo $item['titre_arti']; ?> <em>créé le <?php echo $item['date_arti']; if (!is_null($item['date_modif_arti'])) echo ' (modifié le ' . $item['date_modif_arti'] . ')' ?></em></h1>
            <p><?php echo htmlspecialchars($item['texte_arti']); ?></p>
        </article>

        <?php

        }
    }

    ?>

    <?php

    if (!empty($_SESSION)) {


        ?>

        <div class="container">
            <div class="row justify-content-center">
                <a href="ecritureArticle.php" class="btn btn-outline-success align-self-center">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
            </div>
        </div>

        <?php

    }

    ?>

</div>

<?php

include 'footer.php';

include 'script_import.php';

?>

<script>

    $("article").click(function () {
        window.location.href = "article.php?index=" + $(this).attr("articleId");
    });

</script>

</body>
</html>

