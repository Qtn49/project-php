<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rédaction d'un article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/inscription.css" >
    <link rel="stylesheet" href="style/style.css" >
    <link rel="stylesheet" href="style/connexion.css" >
</head>
<body>

<?php

include 'footer.php';
include 'header.php';

?>

<div class="grid-container">
    <div class="cadre-connexion">

        <form method="post">
            <label for="titre">Titre :</label><br>
            <input type="text" id="titre" name="titre"  size="30"><br>

            <label for="contenu_article">Contenu du l'article :</label><br>
            <textarea id="contenu_article" name="contenu_article" class="m-2" style="resize: none" minlength="10" ></textarea><br>

            <button type="submit" class="m-3 mb-4">Valider</button>
            <button type="button" class="m-3 mb-4">Annuler</button>

        </form>

    </div>
</div>

<?php

include_once '../controller/ArticleController.php';

$article = new ArticleController($_POST['titre'], $_POST['contenu_article'], "brouillon");

$article->sendArticle();

?>

</body>
</html>
