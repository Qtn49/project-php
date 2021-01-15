<?php


class Article extends CI_Controller
{

    public function show () {

        $index = $this->route['params']['index'];
        $article = ArticleModel::getArticle($index);

        if (is_null($article))
            $this->twig->display('error404.html.twig');
        else
            $this->twig->display('article.php', array('article' => $article));

    }

    public function ecrireArticle () {

        $params = $this->route['params'];

        if (empty($params) || empty($_SESSION)) {

            $this->twig->display('ecritureArticle.php');

        }else {

            $article = new ArticleModel("brouillon", $params['titre'], $params['contenu_article'], $_SESSION['id']);
            if ($article->checkDatas()) {
                $article->initToDataBase();
            }

            header('Location: index.php');

        }

    }

}
