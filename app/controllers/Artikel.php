<?php

class Artikel extends Controller
{
    public function index()
    {
        $data['judul'] = 'Penulis - Beranda';
        $data['user'] = $this->model('User_model')->getUserById('1');
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('artikel/index', $data);
        $this->view('templates/footer');
    }
    
    public function tambahArtikel()
    {
        $data['judul'] = 'Penulis - Tambah Artikel';
        $data['user'] = $this->model('User_model')->getUserById('1');
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('artikel/tambah_artikel', $data);
        $this->view('templates/footer');
    }
}