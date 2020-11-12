<?php


class User
{

    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private static $bdd;
    private $logged = false;

    /**
     * User constructor.
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

    public static function getAuth($login, $password) {

        $query = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE mdp_uti = ?");
        $query->execute(array(md5($password)));

        $result = $query->fetchAll();

        echo $login . '<br>';
        echo md5($password) . '<br>';

        $this->logged = count($query) > 0;

        $this->login = $login;

        print_r($result);

        if ($this->logged) {
            $_SESSION['id'] = $query->fetchAll()['id_uti'];
            $_SESSION['login'] = $login;
            $_SESSION['password'] = md5($password);
        }

        return $this->logged;

    }

}