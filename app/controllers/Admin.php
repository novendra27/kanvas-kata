<?php

class Admin extends Controller
{
    public function index()
    {
        $this->checkLogin();
        $data['judul'] = 'Admin - Beranda';
        $data['artikel'] = $this->model('Artikel_model')->getJumlahArtikel();
        $data['kategori'] = $this->model('Kategori_model')->getJumlahKategori();
        $data['pengguna'] = $this->model('Pengguna_model')->getJumlahUser();
        $this->view('admin/templates/header_admin', $data);
        $this->view('admin/templates/navbar_admin', $data);
        $this->view('admin/index', $data);
        $this->view('admin/templates/footer_admin');
    }

    public function checkLogin()
    {
        if ($_SESSION['peran'] !== 'Admin') {
            Flasher::setFlash('bukan', 'admin', 'danger');
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            return true;
            exit;
        }
    }
}
