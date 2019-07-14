<?php

class RegisterController extends Controller
{
    public function test() {
        $this->view->render('auth/404');
    }
    public function showRegister()
    {
        $this->view->render('auth/register');
    }
    public function logout()
    {
        if(!empty($_SESSION['email'])){
            unset($_SESSION['email']);
        }
        header('Location:/register/showRegister');

    }
    public function register()
    {
        $data = $_POST;
        $email = $data['email'];
        $data['password'] = sha1($data['password']);
        $data ['confirm'] = sha1($data['confirm']);
        $this->getModel('user');
        if($data['password'] == $data['confirm']) {
            $save_data = [          // !!! Подумать как переделать
                'email' => $data['email'],
                'password' => $data['password'],
                'username' => $data['username']
            ];
            $this->model->create($save_data);
            $_SESSION['email'] = $email;
            header('Location:/main/index');
        } else {
            header('Location:/register/showRegister');
        }
    }

    public function checkUser()
    {
        if (!empty($_SESSION['email'])) {
            header('Location:/main/index');
        } else {
            $this->view->render('auth/login');
        }
    }

    public function auth()
    {
        $data = $_POST;
        $email =  $data['email'];
        $password = sha1($data['password']);
        $this->getModel('user');
        $users = $this->model->findWhere($email);
        if($password == $users['password']) {
            $_SESSION['email'] = $email;
            if(!empty($_SESSION['email'])) {
                header('Location:/main/index');
            }
        } else {
            header ('Location:/');
        }
    }

    public function Error404()
    {
        $this->view->render('auth/404');
    }


}