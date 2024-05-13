<?php

class Auth extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('auth/header_auth', $data);
        $this->view('auth/login', $data);
        $this->view('auth/footer_auth', $data);
    }

    public function register()
    {
        $data['judul'] = 'Register';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('auth/header_auth', $data);
        $this->view('auth/register', $data);
        $this->view('auth/footer_auth', $data);
    }

    public function tambahData()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }
}
