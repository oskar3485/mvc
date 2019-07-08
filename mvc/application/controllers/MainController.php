<?php

class MainController extends Controller
{
    public function __construct()
    {
       parent::__construct();
    }
    public function index()
    {
        $this->getModel('post');
        $posts = $this->model->readAll();
        $data['posts'] = [];
        foreach ($posts as $post) {
            $data['posts'][] = (object)$post;
        }
        $this->view->render('welcome_view', $data);
    }
//    public function createUser()
//    {
//        $data = $_POST;
//        $this->getModel('user');
//        $this->model->create($data);
//
//        if(isset($_SERVER['HTTP_REFERER'])) {
//            $previous = $_SERVER['HTTP_REFERER'];
//            header('Location:' . $previous);
//        }
//    }

//    public function updateUser($id)
//    {
//        $this->getModel('user');
//        $user = $this->model->findById($id);
//        $this->view->render('update_view', $user);
//    }
//
//    public function edit($id)
//    {
//        $data = $_POST;
//        $this->getModel('user');
//        $this->model->update($data,$id);
//        $main_url = $_SERVER['HTTP_ORIGIN'];
//        header('Location: ' . $main_url);
//    }
//    public function deleteUser()
//    {
//        $this->getModel('user');
//        $delete = $this->model->delete();
//        if(isset($_SERVER['HTTP_REFERER'])) {
//            $previous = $_SERVER['HTTP_REFERER'];
//            header('Location:' . $previous);
//        }
//    }
}