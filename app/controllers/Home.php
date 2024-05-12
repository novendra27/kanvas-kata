<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Home';
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}
