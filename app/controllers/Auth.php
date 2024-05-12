<?php

class Auth extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('auth/login', $data);
    }

    public function register()
    {
        $data['judul'] = 'Register';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('auth/register', $data);
    }
}
