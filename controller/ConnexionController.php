<?php

include_once 'utils/BDDController.php';
class ConnexionController
{

    private $mail;
    private $password;

    public function __construct($mail, $password)
    {

        $this->mail = $mail;
        $this->password = $password;

    }

    /**
     * vérifie que les données de connexion sont valides
     */
    public function checkConnection () {

        BDDController::prepareQuery();

    }

    /**
     * met à jour la variable de session
     */
    public function createSession () {



    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}