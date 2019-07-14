<?php

class MainController extends Controller
{
    public function __construct()
    {
       parent::__construct();
    }
    public function index()
    {
        if (!empty($_SESSION['email'])) {
            $this->getModel('post');
            $posts = $this->model->readAll();
            $data['posts'] = [];
            foreach ($posts as $post) {
                $data['posts'][] = (object)$post;
            }
            $this->view->render('welcome', $data);
        } else {
            $this->view->render('auth/403');
        }

    }
}