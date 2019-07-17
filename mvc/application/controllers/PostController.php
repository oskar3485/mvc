<?php

class PostController extends Controller
{
    public function create()
    {
        if (!empty($_SESSION['token'])) {
            $this->view->render('post/create');
        } else {
            $code = 403;
            $this->getError($code);
        }
    }
    public function save()
    {
        if (!empty($_SESSION['token'])) {
            $data = $_POST;
            $data['created_at'] = date('Y-m-d H:m:s');
            $data['user_id'] = $_SESSION['id'];
            if (!empty($data) && !empty($data['name'])) {
                $this->getModel('post');
                $this->model->create($data);
                if (isset($_SERVER['HTTP_REFERER'])) {
                    $main = $_SERVER['HTTP_ORIGIN'];
                    header('Location:' . $main);
                }
            }
        } else {
            $code = 403;
            $this->getError($code);
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
        if (!empty($_SESSION['token'])) {
            $this->getModel('post');
            $post = $this->model->findById($id);
            if(!empty($post['user_id'])) {
                $author_id = $post['user_id'];
                if ($_SESSION['id'] == $author_id) {
                    $this->view->render('post/update',$post);
                } else {
                    header('Location:/');
                }
            }

        } else {
            $code = 403;
            $this->getError($code);
        }
    }

    public function edit($id)
    {
        if (!empty($_SESSION['token'])) {
            $data = $_POST;
            if (!empty($data)) {
                $this->getModel('post');
                $this->model->update($data, $id);
                $main = $_SERVER['HTTP_ORIGIN'];
                header('Location:' . $main);
            }
        } else {
            $code = 403;
            $this->getError($code);
        }
    }

    public function delete($id)
    {
        if (!empty($_SESSION['token'])) {
            $this->getModel('post');
            $post = $this->model->findById($id);
            if(!empty($post['user_id'])) {
                $author_id = $post['user_id'];
                if ($_SESSION['id'] == $author_id) {
                    $this->model->delete($id);
                    header('Location:/');
                } else {
                    header('Location:/');
                }
            }

        } else {
            $code = 403;
            $this->getError($code);
        }
    }
}

