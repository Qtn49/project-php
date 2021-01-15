<?php


class IndexController extends Controller
{

    public function display () {

        $this->twig->display('display.html.twig', array('articles' => Article::getAllArticles()));

    }

}