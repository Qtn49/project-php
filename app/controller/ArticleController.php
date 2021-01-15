<?php


class ArticleController extends Controller
{

    public function show () {

        $index = $this->route['params']['index'];
        $article = Article::getArticle($index);

        if (is_null($article))
            $this->twig->display('error404.html.twig');
        else
            $this->twig->display('article.html.twig', array('article' => $article));

    }

    public function ecrireArticle () {

        $params = $this->route['params'];

        if (empty($params) || empty($_SESSION)) {

            $this->twig->display('ecritureArticle.html.twig');

        }else {

            $article = new Article("brouillon", $params['titre'], $params['contenu_article'], $_SESSION['id']);
            if ($article->checkDatas()) {
                $article->initToDataBase();
            }

            header('Location: index.php');

        }

    }

}