<?php

class Router
{
    public function start()
    {
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $route = explode('/', $url);

        if (!empty($route[1])) {

            $class_name = ucfirst($route[1]) . 'Controller';

        }
        else {
            $class_name = 'MainController';
        }

        $filename = 'application/controllers/' . $class_name . '.php';

        if (file_exists($filename)) {
            require_once $filename;
            $controller = new $class_name;
        }
        if (!empty($route[2])) {
            $action_name = $route[2];
        } else {
            $action_name = 'index';
        }
        if(!$controller || !$action_name) {
            $controller = new ErrorController();
            $action_name = 'getError';
            $controller->$action_name(404);
        }

        if (!empty($route[3])) {
            $params = $route[3];
        } else {
            $params = null;
        }
        $controller->$action_name($params);


    }
}