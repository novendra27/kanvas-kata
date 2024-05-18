<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $data['pengguna'] = $this->model('Pengguna_model')->getUserById('10001');
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Home';
        $data['pengguna'] = $this->model('Pengguna_model')->getUserById('10001');
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}
