<?php

class RegisterController extends Controller
{
    public function index()
    {
        $this->view->render('auth/register');
    }

    public function logout()
    {
        if(!empty($_SESSION['email'])){
            unset($_SESSION['email']);
            unset($_SESSION['token']);
        }
        header('Location:/');

    }
    public function register()
    {
        $data = $_POST;
        $field = 'email';
        $email = $data['email'];
        $data['password'] = sha1($data['password']);
        $data ['confirm'] = sha1($data['confirm']);
        $this->getModel('user');
        if(($data['password'] == $data['confirm']) && (!empty($data['email'])) &&
            (!empty($data['password'])) && (!empty($data['username'])) ) {
            $users = $this->model->findWhere($field,$email);
            if (empty($users)) {
                $save_data = [
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'username' => $data['username'],
                    'remember_token' => $this->rememberToken()
                ];
                $this->model->create($save_data);
                $_SESSION['email'] = $email;
                header('Location:/');
            } else {
                header('Location:/register/index');
            }
        } else {
            header('Location:/register/index');
        }
    }

    public function checkUser()
    {
        if (!empty($_SESSION['token'])) {
            header('Location:/');
        } else {
            $this->view->render('auth/login');
        }
    }

    public function auth()
    {
        $data = $_POST;
        $field = 'email';
        $email = $data['email'];
        $password = sha1($data['password']);
        $this->getModel('user');
        $users = $this->model->findWhere($field,$email);
        $id = $users['id'];
        if(($password == $users['password']) && (!empty($password) && (!empty($email)))) {
            $_SESSION['token'] = $users['remember_token'];
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;
            if(!empty($_SESSION['token'])) {
                header('Location:/');
            }
        } else {
            header ('Location:/register/checkUser');
        }
    }

    public function rememberToken()
    {
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max = 20;
        $size = strlen($chars)-1;
        $remember_token = '';
        while ($max --) {
            $remember_token .= $chars[rand(0,$size)];
        }
        return $remember_token;
    }
}