<?php


class User
{

    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $id;

    /**
     * User constructor.
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $password
     */
    public function __construct($nom, $prenom, $mail, $password)
    {
        $this->nom = htmlspecialchars($nom);
        $this->prenom = htmlspecialchars($prenom);
        $this->mail = htmlspecialchars($mail);
        $this->password = htmlspecialchars($password);
    }

    public function updateToDataBase () {

        include_once '../utils/Database.php';

        $query = Database::getInstance()->prepare("INSERT INTO Utilisateur(nom_uti, prenom_uti, mail_uti, mdp_uti) VALUES (?, ?, ?, MD5(?))");
        $query->execute(array($this->nom, $this->prenom, $this->mail, $this->password));

    }

    public static function getAuthFromIndex ($index) {

        include_once '../utils/Database.php';

        $query = Database::getInstance()->prepare("SELECT * FROM Utilisateur WHERE id_uti = ?");
        $query->execute(array($index));

        $result = $query->fetch();

        $user = null;

        if (!empty($result)) {

            $user = new User($result['nom_uti'], $result['prenom_uti'], $result['mail_uti'], $result['mdp_uti']);
            $user->id = $result['id_uti'];

        }

        return $user;

    }

    public static function getAuth($mail, $password) {

        include_once '../utils/Database.php';

        $query = Database::getInstance()->prepare("SELECT * FROM Utilisateur WHERE mail_uti = ? AND mdp_uti = MD5(?)");
        $query->execute(array($mail, $password));

        $result = $query->fetch();

        echo $mail . '<br>';
        echo md5($password) . '<br>';

        $user = null;

        if (!empty($result)) {

            $user = new User($result['nom_uti'], $result['prenom_uti'], $result['mail_uti'], $result['mdp_uti']);
            $user->id = $result['id_uti'];

        }

        return $user;

    }

    public function checkDatas()
    {

        return !empty($this->prenom) && !empty($this->nom) && !empty($this->mail) && !empty($this->password);

    }

    public function setSession()
    {

        $_SESSION['id'] = $this->id;
        $_SESSION['prenom'] = $this->prenom;
        $_SESSION['nom'] = $this->nom;
        $_SESSION['mail'] = $this->mail;
        $_SESSION['password'] = $this->password;

    }

}