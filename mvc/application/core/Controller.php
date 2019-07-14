<?php


class Controller
{
    public $view;
    public $model;

    public function __construct()
    {
        $this->view = new View();
        session_start();
    }

    public function getModel($model_name)
    {
        $class_name = ucfirst($model_name);
        $file_name = 'application/models/' . $class_name . '.php';
        if (file_exists($file_name)) {
            require $file_name;
            $this->model = new $class_name;
        }
    }

}