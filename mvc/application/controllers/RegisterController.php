<?php

class RegisterController extends Controller
{
    public function showRegister()
    {
        $this->view->render('auth/register');
    }
    public function register()
    {
        $data = $_POST;
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
            header('Location:/main/index');
        } else {
            header('Location:/register/showRegister');
        }
    }


    public function checkUser()
    {
//        $this->getModel('user');
//        $users = $this->model->readAll(); 111
        //1 Если пользователь зарегестрирован - редирект на main/index, иначе - отправляем на форму авторизации
        $this->view->render('auth/login');
    }

    public function auth()
    {
        $data = $_POST;
        $email =  $data['email'];
        $password = sha1($data['password']);
        $this->getModel('user');
        $users = $this->model->findWhere($email);
        if($password == $users['password']) {
            session_start();
            $_SESSION['email'] = $email;
            if(!empty($_SESSION['email'])) {
//                $this->view->render('main',$_SESSION['email']);
                header('Location:/main/index');
            }
        } else {
            header ('Location:/');
        }

    }
}