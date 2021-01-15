<div class="article-container">

    <?php foreach ($articles as $article) { ?>

        <?php if ($article['mode_arti'] != "brouillon") { ?>

            <article articleId="<?php echo $article['id_arti'];?>">
                <h1>
					<?php echo $article['titre_arti']; ?> <em>créé le <?php echo $article['date_arti']; ?> <?php if (!is_null($article['date_modif_arti'])) { ?> modifié le <?php echo $article['date_modif_arti']; ?><?php } ?></em>
                </h1>
                <p><?php echo htmlspecialchars($article['texte_arti']) ?></p>
            </article>

        <?php } ?>

	<?php

	}

	?>

<?php if (!empty($_SESSION)) { ?>

    <div class="container">
        <div class="row justify-content-center">
            <a href="?action=ecrireArticle" class="btn btn-outline-success align-self-center">
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

<script>
	$("article").click(function () {

		var url = window.location.href.substring(0, window.location.href.indexOf('project-php-code-igniter'));

		console.log(url);

	    window.location.href = "<?php echo base_url('index.php/index/view/'); ?>" + $(this).attr("articleId");
	});
</script>
