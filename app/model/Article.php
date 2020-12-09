<?php


class Article
{

    private $etat;
    private $titre_arti;
    private $texte_arti;
    private $date_arti;
    private $date_modif_arti;
    private $id_arti;
    private $user_id;

    /**
     * Article constructor.
     * @param $date_arti
     * @param $etat
     * @param $date_modif_arti
     * @param $titre_arti
     * @param $texte_arti
     */
    public function __construct($etat, $titre_arti, $texte_arti)
    {
        $this->etat = htmlspecialchars($etat);
        $this->titre_arti = htmlspecialchars($titre_arti);
        $this->texte_arti = htmlspecialchars($texte_arti);
    }

    public static function getArticle ($index) {

        include_once '../utils/Database.php';

        $query = Database::getInstance()->prepare("SELECT * FROM Article WHERE id_arti = ?");
        $query->execute(array($index));

        $reponse = $query->fetch();

        if (empty($reponse)) {
            return null;
        }

        $article = new Article($reponse['mode_arti'], $reponse['titre_arti'], $reponse['texte_arti']);
        $article->id_arti = $reponse['id_arti'];
        $article->user_id = $reponse['id_uti'];
        $article->date_arti = $reponse['date_arti'];
        $article->date_modif_arti = $reponse['date_modif_arti'];

        return $article;

    }

    public function initToDataBase () {

        include_once '../utils/Database.php';

        $query = Database::getInstance()->prepare("INSERT INTO Article(date_arti, titre_arti, texte_arti, mode_arti) VALUES (NOW, ?, ?, ?)");
        $query->execute(array($this->titre_arti, $this->texte_arti, $this->etat));

//        var_dump($this->titre_arti, $this->texte_arti, $this->etat);

    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @return string
     */
    public function getTitreArti()
    {
        return $this->titre_arti;
    }

    /**
     * @return string
     */
    public function getTexteArti()
    {
        return $this->texte_arti;
    }

    /**
     * @return string
     */
    public function getDateArti()
    {
        return $this->date_arti;
    }

    /**
     * @return string
     */
    public function getDateModifArti()
    {
        return $this->date_modif_arti;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    public function checkDatas()
    {

        return !empty($this->etat) && !empty($this->titre_arti) && !empty($this->texte_arti);

    }

}