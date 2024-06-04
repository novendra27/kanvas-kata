<?php

class Kategori extends Controller
{
    public function index()
    {
        $this->checkLogin();
        $data['judul'] = 'Penulis - Beranda';
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('artikel/index', $data);
        $this->view('templates/footer');
    }
    
    public function checkLogin()
    {
        if ($_SESSION['peran'] !== 'Penulis') {
            Flasher::setFlash('bukan', 'penulis', 'danger');
            header('Location: ' . BASEURL . '/auth');
            exit;
        }else{
            return true;
            exit;
        }
    }

    
}