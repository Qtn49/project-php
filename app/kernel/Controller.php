<?php

session_start();

require ROOT . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected $route;
    protected $vue;
    protected $twig;

    public function __construct($route)
    {
        $this->route = $route;
        $this->vue = new View($route);
        $this->loadTwig();
    }

    public function loadTwig() {

        $loader = new FilesystemLoader(ROOT . '/app/templates');
        $this->twig = new Environment($loader, [
            'debug' => true
        ]);
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addGlobal('session', $_SESSION);

//        echo $twig->render('display.html.twig', ['name' => 'John Doe',
//            'occupation' => 'gardener']);
    }


}