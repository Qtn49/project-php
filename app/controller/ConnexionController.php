<?php


class ConnexionController extends Controller
{

    public function connexion () {

        $params = $this->route['params'];

        if (empty($params))
            $this->twig->display('connexion.html.twig');

        $user = User::getAuth($params['mail'], $params['mdp']);

        if (!is_null($user) && $user->checkDatas()) {

            $user->setSession();
            header('Location: index.php');

        }else {

            $this->twig->display('connexion.html.twig');
        }

    }

    public function inscription () {

        if (!empty($this->route['params'])) {

            $params = $this->route['params'];

            $user = new User($params['nom'], $params['prenom'], $params['mail'], $params['password']);

            if ($user->checkDatas()) {

                $user->updateToDataBase();
                $user->setSession();
                header('Location: index.php');

            }

        }

        $this->twig->display('inscription.html.twig');

    }

    public function deconnexion () {

        session_unset();
        session_destroy();
        header('Location: index.php');

    }

}