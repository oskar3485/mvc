<?php

class CommentController extends Controller
{
    public function create($id)
    {
        $this->getModel('post');
        $post = $this->model->findById($id);
        $post_id = $post['id'];
        $user_id = $post ['user_id'];
        $this->getConnectModel('comment');
        $data = $_POST;
        if(!empty($data)) {
            $comment = [
                'text' => $data['text'],
                'post_id' => $post_id,
                'user_id' => $user_id,
            ];
            $this->connection_model->create($comment);
                $redirect = '/post/show/';
                header('Location:'. $redirect . $post_id);
        }
    }

    public function delete($id)
    {
        $this->getModel('comment');
        $comment = $this->model->findById($id);
        $post_id = $comment['post_id'];
        $this->model->delete($id);
        header('Location:/post/show/'.$post_id);
    }

    public function showById($id)
    {
        $field = 'post_id';
        $value = $id;
        $this->getModel('comment');
        $comments['comment'] = $this->model->readAllWhere($field,$value);
        $this->view->render('comment/showAll',$comments);
    }

    public function update($id)
    {
       $this->getModel('comment');
       $comment = $this->model->findById($id);
       $this->view->render('comment/test_update',$comment);
    }

    public function edit($id)
    {
        if (!empty($_SESSION['token'])) {
            $data = $_POST;
            if (!empty($data)) {
                $this->getModel('comment');
                $this->model->update($data, $id);
                $main = $_SERVER['HTTP_ORIGIN'];
                header('Location:' . $main);
            }
        } else {
            $code = 403;
            $this->getError($code);
        }
    }
}