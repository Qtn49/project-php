<?php


session_start();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lecture d'un article</title>
    <?php

    include_once 'style_import.php';

    ?>
</head>
<body>

<?php

include_once 'header.php';

include_once '../model/Article.php';

if (!isset($_GET['index']) || empty($_GET['index'])) {

    callPageNotFound();

}

$article = Article::getArticle($_GET['index']);

function callPageNotFound () {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}

if (is_null($article))
    callPageNotFound();


?>

<article>
    <h1><?php echo $article->getTitreArti() ?> <em>créé le <?php echo $article->getDateArti(); if (!empty($article->getDateModifArti())) echo ' (modifié le ' . $article->getDateModifArti() . ')' ?></em></h1>
    <p id="texteArti"><?php echo $article->getTexteArti(); ?></p>
    <?php

    if (isset($_SESSION['id']) && $article->getUserId() == $_SESSION['id'])
    {?>

        <a href="" id="editer">éditer</a>

    <?php
    }
    ?>

    <form action="">
        <input type="submit" value="valider">
    </form>

</article>

<?php

include_once 'footer.php';
include "script_import.php";

?>

<script>

    $("form").hide();

    $("#editer").click((e) => {
        var textArea = $("<textarea></textarea>");
        var textArti = $("#texteArti");
        var textContent = textArti.text();
        textArea.val(textContent);
        textArti.hide();
        $("form").show();
        $("article").append(textArea);

        e.preventDefault();

    });

</script>

</body>
</html>