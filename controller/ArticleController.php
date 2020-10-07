<?php

include_once 'utils/BDDController.php';

class ArticleController
{

    private $titre;
    private $texte;
    private $mode;

    /**
     * ArticleController constructor.
     * @param $titre
     * @param $texte
     * @param $mode
     */
    public function __construct($titre, $texte, $mode)
    {
        $this->titre = $titre;
        $this->texte = $texte;
        $this->mode = $mode;
    }

    /**
     * envoie l'article sur la base de données
     */
    public function sendArticle () {

        BDDController::prepareQuery();

    }

    /**
     *
     */
    private function checkDatas () {

        if (!isset($this->titre) or !isset($this->texte) or !isset($this->mode) or empty($this->titre) or empty($this->texte) or empty($this->mode)) {

            return false;

        }

        $this->titre = htmlspecialchars($this->titre);
        $this->texte = htmlspecialchars($this->texte);
        $this->mode = htmlspecialchars($this->mode);

    }

    /**
     * retourne vrai si les valeurs ajoutées à l'article sont valides (non vides...)
     * @return boolean
     */
    private function checkArticle () {

        return true;

    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @param mixed $texte
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param mixed $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

}