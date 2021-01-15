<?php

class Router
{
    public static function analyze($params)
    {
        $result = array(
            "controller" => "Error",
            "action" => "error404",
            "params" => array()
        );

        if (count ($params) == 0) { // Appel sans paramètres (affichage de la liste complète)
            $result["controller"] = "Index";
            $result["action"] = "display";
        } elseif (isset($params["action"])) {
            $result["action"] = $params['action'];
            switch ($params["action"]) {
                case "connexion" :
                case "deconnexion":
                case "inscription" :
                    $result["controller"] = "Connexion";
                    $result['params'] = array_slice($params, 1);
                    var_dump($result);
                    break;
                case "show":
                    $result["params"]["index"] = $params['index'];
                case "ecrireArticle":
                    $result["controller"] = "Article";
                    $result["params"] = array_slice($params, 1);
                    break;
                case "getHastags":
                    $result["controller"] = "Hashtag";
                default :
            }
        } // sinon erreur 404 par défaut

        if (DEBUG) {
            echo "Route : ";
            var_dump ($result);
        }

        return $result;

    }

}