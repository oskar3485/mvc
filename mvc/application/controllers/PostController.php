<?php

class PostController extends Controller
{



    public function create()
    {
        if (!empty($_SESSION['email'])) {
            $this->view->render('post/create');
        } else {
            $this->view->render('auth/403');
        }
    }
    public function save()
    {
        if (!empty($_SESSION['email'])) {
            $data = $_POST;
            $data['created_at'] = date('Y-m-d H:m:s');
            if (!empty($data)) {
                $this->getModel('post');
                $this->model->create($data);

                if (isset($_SERVER['HTTP_REFERER'])) {
                    $main = $_SERVER['HTTP_ORIGIN'];
                    header('Location:' . $main);
                }
            }
        } else {
            $this->view->render('auth/403');
        }

    }
    public function show($id)
    {
        $this->getModel('post');
        $show = $this->model->findByid($id);
        $this->view->render('post/show',$show);
    }

    public function update($id)
    {
        if (!empty($_SESSION['email'])) {
            $this->getModel('post');
            $post = $this->model->findById($id);
            $this->view->render('post/update',$post);
        } else {
            $this->view->render('auth/403');
        }
    }

    public function edit($id)
    {
        if (!empty($_SESSION['email'])) {
            $data = $_POST;
            if (!empty($data)) {
                $this->getModel('post');
                $this->model->update($data, $id);
                $main = $_SERVER['HTTP_ORIGIN'];
                header('Location:' . $main);
            }
        } else {
            $this->view->render('auth/403');
        }
    }

    public function delete($id)
    {
        if (!empty($_SESSION['email'])) {
            $this->getModel('post');
            $this->model->delete($id);
            header('Location:/');
        } else {
            $this->view->render('auth/403');
        }
    }
}

