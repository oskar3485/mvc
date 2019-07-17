<?php


class Controller
{
    public $view;
    public $model;
    public $connection_model;

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

    public function getConnectModel($connection_model)
    {
        $model_name = ucfirst($connection_model);
        $file_name = 'application/models/' . $model_name . '.php';
        if (file_exists($file_name)) {
            require $file_name;
            $this->connection_model = new $model_name;
        }
    }

    public function getError($code)
    {
        $this->view->render('errors/' . $code);
    }

}