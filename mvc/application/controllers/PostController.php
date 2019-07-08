<?php

class PostController extends Controller
{



    public function create()
    {
        $this->view->render('post/create');
    }
    public function save()
    {
        $data = $_POST;
        $data['created_at'] = date('Y-m-d H:m:s');
        if (!empty($data)) {
            $this->getModel('post');
            $this->model->create($data);

            if(isset($_SERVER['HTTP_REFERER'])) {
                $main = $_SERVER['HTTP_ORIGIN'];
                header('Location:' . $main);
            }
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
        $this->getModel('post');
        $post = $this->model->findById($id);
        $this->view->render('post/update',$post);
    }

    public function edit($id)
    {
        $data = $_POST;
        if (!empty($data)) {
            $this->getModel('post');
            $this->model->update($data, $id);
            $main = $_SERVER['HTTP_ORIGIN'];
            header('Location:' . $main);
        }
    }

    public function delete($id)
    {
        $this->getModel('post');
        $this->model->delete($id);
        header('Location:/');
    }
}

