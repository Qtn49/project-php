<?php


class InscriptionController
{

    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $db;

    /**
     * InscriptionController constructor.
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $password
     */
    public function __construct($nom, $prenom, $mail, $password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
    }

    /**
     * @author Orane
     *
     * Vérifier la cohérence des données à l'aide des regex
     * utiliser la fonction empty() pour vérifier que la variable n'est pas vide
     * utiliser la fonction isset() pour vérifier que la variable existe
     *
     * @return true : si les données sont correctes
     * @return false : si les données sont incomplètes ou faussées
     */
    public function checkDatas()
    {
    }

    /**
     * @author Quentin et Thibaud
     *
     * mettre à jour la base de données
     * utiliser la fonction html_special_chars() pour éviter d'interpréter le contenu de la variable s'il contient du code
     * Utiliser la fonction MD5() de sql
     *
     */
    public function updateDataBase()
    {

        $query = "INSERT INTO Utilisateur(nom_uti, prenom_uti, mail_uti, mdp_uti) VALUES (?, ?, ?, 'MD5(?)')";
        $this->db->prepare($query);
        $this->db->execute(array($this->nom, $this->prenom, $this->mail, $this->password));

    }

    /**
     */
    public function setSession()
    {

//        $_SESSION['nom'] = ;

    }
}