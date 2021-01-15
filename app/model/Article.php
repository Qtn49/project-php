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
    public function __construct($etat, $titre_arti, $texte_arti, $user_id)
    {
        $this->etat = htmlspecialchars($etat);
        $this->titre_arti = htmlspecialchars($titre_arti);
        $this->texte_arti = htmlspecialchars($texte_arti);
        $this->user_id = $user_id;
    }

    public static function getAllArticles () {

        $db = Database::getConnexion();

        $sql = "SELECT * FROM Article";
        $stmt = $db->prepare ($sql);
        $stmt->execute ();

        return $stmt->fetchAll ();

    }

    public static function getArticle ($index) {

        $query = Database::getConnexion()->prepare("SELECT * FROM Article WHERE id_arti = ?");
        $query->execute(array($index));

        $reponse = $query->fetch();

        if (empty($reponse)) {
            return null;
        }

        $article = new Article($reponse['mode_arti'], $reponse['titre_arti'], $reponse['texte_arti'], $reponse['id_uti']);
        $article->id_arti = $reponse['id_arti'];
        $article->date_arti = $reponse['date_arti'];
        $article->date_modif_arti = $reponse['date_modif_arti'];

        return $article;

    }

    public function initToDataBase () {

        $query = Database::getConnexion()->prepare("INSERT INTO Article(date_arti, titre_arti, texte_arti, mode_arti, id_uti) VALUES (NOW(), ?, ?, ?, ?)");
        $query->execute(array($this->titre_arti, $this->texte_arti, $this->etat, $this->user_id));

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