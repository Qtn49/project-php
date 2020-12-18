<?php

class View
{
    protected $route;
    protected $data;

    public function __construct($route)
    {
        $this->route = $route;

    }

    public function display()
    {
        $vue = "../app/templates/" . $this->route['controller'] . "/" . $this->route['action'] . ".html.twig";

        if (file_exists ($vue)) {
            include ($vue);
        }

    }

    public function setData($data)
    {

        $this->data = $data;

    }

}