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
    <title>Rédaction d'un article</title>
    <?php

    include 'style_import.php';

    ?>
</head>
<body>

<?php

include 'footer.php';
include 'header.php';

?>

<div class="grid-container">
    <div class="cadre-connexion" style="grid-row: 1/3;margin-top: 10vh;">

        <form method="post">
            <label for="titre">Titre :</label><br>
            <input type="text" id="titre" name="titre"  size="30"><br>

            <label for="contenu_article">Contenu du l'article :</label><br>
            <textarea id="contenu_article" name="contenu_article" class="m-2" style="resize: none" minlength="10" ></textarea><br>

            <div class="ui-widget">
                <label for="hashtag">Hashtags : </label><br>
                <input type="text" id="hashtag" name="hashtags" /><br>
            </div>

            <button type="submit" class="m-3 mb-4">Valider</button>
            <button type="button" class="m-3 mb-4">Annuler</button>

        </form>

    </div>
</div>

<?php

include_once '../model/Article.php';

$article = new Article( "brouillon", $_POST['titre'], $_POST['contenu_article']);

if ($article->checkDatas()) {

    $article->initToDataBase();
    header('Location: index.php');

}
include 'script_import.php';

?>


<script>
    $(':button').click(() => {
        location.replace("index.php");
    });

    // $("#hashtag").autocomplete({
    //     source: (request, response) => {
    //         $.ajax({
    //             type: "POST",
    //             url: "gethashtags.php",
    //             dataType: "json",
    //             data : {
    //                 term: () => {
    //                     let mot = request.term.split(' ').last;
    //                     return mot;
    //                 }
    //             },
    //             success: (data) => {
    //                 response(data);
    //             }
    //         });
    //     },
    // });

</script>

</body>
</html>
