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
        $comment = [
            'text' => $data['text'],
            'post_id' => $post_id,
            'user_id' => $user_id,
        ];
        $this->connection_model->create($comment);
    }

    public function delete($id)
    {
//        $this->getModel('comment');
//        $comment = $this->model->findById($id);
    }

    public function showById($id)
    {
        $field = 'post_id';
        $value = $id;
        $this->getModel('comment');
        $comments = $this->model->readAllWhere($field,$value);
        $this->view->render('post/show',$comments);
    }
}